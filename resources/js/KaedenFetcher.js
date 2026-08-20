export async function KaedenFetcher(path) {
    try {
       const response = await fetch(path);

        if(!response.ok) {
            throw new Error(`Response status: ${response.status}\nResponse: \n ${response}`);
        }

        const result = await response.text();
        try {
            return JSON.parse(result);
        } catch (err) {
            console.error("Malformed JSON received:");
            console.error(result);
            throw err;
        }
    }
    catch (error) {
        console.error(error.stackTrace, response);
    }
}