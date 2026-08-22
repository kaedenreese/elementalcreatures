<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required|max:256',
            'email' => 'string|required|max:256',
            'message' => 'string|required|max:2048'
        ]);

        $contactus = new ContactUs($validated);

        $contactus->save();

        $client = new Client();
        $url = 'https://api.mail.hostinger.com/api/v1/mailboxes/' . env('MAILBOX_RESOURCE_ID') . '/send';

        $body = [
            "to" => [env('OWNER_EMAIL_ADDRESS')],
            "displayName" => "Elemental Creatures - Do Not Reply",
            "subject" => "Notification from Elemental Creatures Website",
            "html" => "<h3>Somebody sent a message from elementalcreaturestcg.com</p><p>Name: {$contactus->name}</p>Email: {$contactus->email}</p><p>Message</p><p>{$contactus->message}</p><p><i>To reply to this message, please use the email listed above.</i>"
        ];

        $body = json_encode($body);

        $headers = [
            'Authorization' => 'Bearer ' . env('MAIL_API_TOKEN'),
            'Content-Type' => 'application/json'
        ];

        $request = new Psr7Request(
            method: 'POST',
            uri: $url,
            headers: $headers,
            body: $body
        );

        try {
            $response = $client->send($request, ['verify' => false]);
            return view('thankyou');
        }
        catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
