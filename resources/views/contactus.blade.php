@push('css')
@endpush

@push('js')
@endpush

@include('components.head')
<body>
@include('components.header')

<main>
        <div id="wrapper">
            <section>
                <div class="h3-wrapper">
                    <div class="horizontal-bar"></div>
                        <h3>Contact Us</h3>
                    <div class="horizontal-bar"></div>
                </div>

                <p class="description-text">You can use this form or email <a href="mailto:elementalcreatures@gmail.com">elementalcreatures@gmail.com</a> directly. We look forward to hearing from you!</p>
            </section>

            <section>
                <form method="post" action="{{ route('doContactus') }}">
                    <label for="name">Your Name</label>
                    <input type="textbox" id="name" name="name" required>
                    <label for="email">Your Email</label>
                    <input type="email" id="email" name="email" required>
                    <label for="message">Your Message</label>
                    <textarea name="message" id="message" required></textarea>
                    <button type="submit" class="site-create-button">Send Message</button>
                </form>
            </section>
        </div>
    </main>

@include('components.footer')
</body>