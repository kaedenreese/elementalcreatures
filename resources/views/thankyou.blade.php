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
                        <h3>Thank you for reaching out!</h3>
                    <div class="horizontal-bar"></div>
                </div>

                <p class="description-text" style="margin-top: 150px; margin-bottom: 150px;">Elemental Creatures has received your message. Check your email for replies. We will respond as quickly as we can!</p>
            </section>
        </div>
    </main>

@include('components.footer')
</body>