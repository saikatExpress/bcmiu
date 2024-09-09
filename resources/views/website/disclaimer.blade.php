@extends('website.layout.app')
@section('content')
    <div class="container-fluid position-relative p-0">
        <x-website-header/>

        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ $info['page'] }}</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">{{ $info['page'] }}</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="section">
            <h2 class="section-title">General Information</h2>
            <div class="section-content">
                <p>The information provided by ONNOTOMO Portfolio Management System ("we," "us," or "our") is for general informational purposes only. All information on the Site is provided in good faith, however we make no representation or warranty of any kind, express or implied, regarding the accuracy, adequacy, validity, reliability, availability or completeness of any information on the Site.</p>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">Financial Disclaimer</h2>
            <div class="section-content">
                <p>The information provided on this site is not intended as financial advice and should not be construed as such. Always consult with a financial advisor or other qualified professional before making any investment decisions.</p>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">External Links Disclaimer</h2>
            <div class="section-content">
                <p>Our Site may contain links to other websites or services that are not owned or controlled by ONNOTOMO. We have no control over and assume no responsibility for the content, privacy policies, or practices of any third-party websites or services. You acknowledge and agree that ONNOTOMO shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use of or reliance on any such content, goods or services available on or through any such websites or services.</p>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">Limitation of Liability</h2>
            <div class="section-content">
                <p>In no event shall ONNOTOMO, nor its directors, employees, partners, agents, suppliers, or affiliates, be liable for any indirect, incidental, special, consequential, or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from (i) your use or inability to use the Site; (ii) any unauthorized access to or use of our servers and/or any personal information stored therein.</p>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">Changes to This Disclaimer</h2>
            <div class="section-content">
                <p>We reserve the right to update or change our Disclaimer at any time and you should check this Disclaimer periodically. Your continued use of the Service after we post any modifications to the Disclaimer on this page will constitute your acknowledgment of the modifications and your consent to abide by and be bound by the modified Disclaimer.</p>
            </div>
        </div>
    </div>
@endsection

