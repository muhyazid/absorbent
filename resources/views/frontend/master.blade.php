<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords"
        content="absorbent products, oil absorbents, chemical absorbents, spill kit, environmental safety, industrial cleaning, oil spill solutions, chemical spill solutions, multipurpose absorbents, Cerro, Cerro Absorbent, Absorbent Kit " />
    <meta name="description"
        content="Discover Cerro Absorbent's advanced line of absorbent products. Perfect for managing oil spills, chemical spills, and multipurpose absorption needs, ensuring a safe and clean environment." />
    <meta name="author" content="SRA SAfety | Cerro Absorbent " />
    <link rel="shortcut icon" href="{{ asset('frontend/images/logoaja.png') }}" type="image/x-icon">

    <title>CERRO | Absorbent</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap"
        rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <div class="hero_bg_box">
            <div class="bg-box">
                {{-- background gambar --}}
                <img src="{{ asset('frontend/images/kilangminyak.png') }}" alt=""
                    style="width: 50%; height: auto; ">
            </div>
        </div>

        @include('frontend.header')
        <!-- end header section -->

        <!-- slider section -->
        <section class=" slider_section ">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Serenity in Every Drop <br>
                                            <span>
                                                Embrace Ultimate Absorption
                                            </span>
                                        </h1>
                                        <p>
                                            Introducing our advanced line of absorbent products designed to tackle the
                                            toughest challenges in handling chemical spills, oil leaks, and multipurpose
                                            absorption needs.
                                            Engineered with precision and innovation, our absorbents are your first line
                                            of defense against potential hazards, ensuring a safe and clean environment.
                                        </p>
                                        {{-- <div class="btn-box">
                      <a href="" class="btn-1"> Read more </a>
                      <a href="" class="btn-2">Get A Quote</a>
                    </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Experience Unmatched Absorption <br>
                                            <span>
                                                The Cerro Absorbent Advantage
                                            </span>
                                        </h1>
                                        <p>
                                            tep into the future of spill management with Cerro Absorbent.
                                            Our cutting-edge line of absorbent solutions is meticulously designed to
                                            address the most demanding situations, from hazardous chemical spills to
                                            persistent oil leaks.
                                            Each product in our range combines advanced engineering with innovative
                                            materials to deliver unparalleled absorption and protection.
                                            Rely on Cerro Absorbent to safeguard your environment and maintain a
                                            pristine, risk-free workspace.
                                        </p>
                                        {{-- <div class="btn-box">
                      <a href="" class="btn-1"> Read more </a>
                      <a href="" class="btn-2">Get A Quote</a>
                    </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Cerro Absorbent <br>
                                            <span>
                                                Unleash the Power of Superior Absorption
                                            </span>
                                        </h1>
                                        <p>
                                            Welcome to a new era in absorption technology with Cerro Absorbent.
                                            Our premium range of absorbent products is crafted to handle even the most
                                            challenging scenarios, including chemical spills, oil leaks, and diverse
                                            absorption tasks.
                                            With a commitment to precision and excellence, our absorbents provide
                                            exceptional efficiency and reliability, ensuring that you stay ahead of
                                            potential risks.
                                            Choose Cerro Absorbent for superior performance and a cleaner, safer
                                            environment.
                                        </p>
                                        {{-- <div class="btn-box">
                      <a href="" class="btn-1"> Read more </a>
                      <a href="" class="btn-2">Get A Quote</a>
                    </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container idicator_container">
                    <ol class="carousel-indicators">
                        {{-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> --}}
                    </ol>
                </div>
            </div>
        </section>
        <!-- end slider section -->
    </div>

    <!-- benefit section -->

    <section class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 px-0">
                    <div class="img_container">
                        <div class="img-box">
                            <img src="{{ asset('frontend/images/admin-ajax.png') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>BENEFIT</h2>
                        </div>
                        <p>
                            One of the significant benefits of purchasing an absorbent is environmental protection and
                            risk mitigation.
                            Absorbent products play an important role in containing and managing spills, whether they
                            involve oil, chemicals or other liquids.
                            By investing in absorbers, individuals and businesses contribute to several sectors.
                        </p>
                        <h6 style="font-weight: bold;">- Environmental Conservation</h6>
                        <h6 style="font-weight: bold;">- Compliance with Regulations</h6>
                        <h6 style="font-weight: bold;">- Workplace Safety</h6>
                        <h6 style="font-weight: bold;">- Cost Savings in Cleanup</h6>
                        <h6 style="font-weight: bold;">- Reputation Management</h6>
                        <p>In summary, investing in absorbents is not just a practical necessity for spill response.
                            It is a proactive step toward environmental responsibility, regulatory compliance, workplace
                            safety, cost-effectiveness, and maintaining a positive reputation.
                        </p>
                        <div class="btn-box">
                            <!-- Updated Read More Button -->
                            <a id="readMoreBtn" href="#">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- POP UP -->
                <div id="benefitModal" class="modal">
                    <div class="modal-content">
                        {{-- <span class="close">&times;</span> --}}
                        <h2 class="judul-popup">Benefits of Using Absorbents</h2>
                        <ul>
                            <li>
                                <p style="font-weight: bold;" class="tulisan-popup">Environmental Conservation:</p>
                                Absorbents help prevent spilled liquids from contaminating soil, water sources, and the
                                air. This proactive approach to spill management safeguards ecosystems, reduces the
                                impact on wildlife, and preserves the overall environmental balance.
                            </li>
                            <li>
                                <p style="font-weight: bold;" class="tulisan-popup">Compliance with Regulations:</p>
                                Using absorbents ensures compliance with environmental regulations and safety standards.
                                Many industries are subject to strict guidelines regarding spill response, and having
                                appropriate absorbent materials on hand helps organizations adhere to these regulations,
                                avoiding potential fines or legal consequences.
                            </li>
                            <li>
                                <p style="font-weight: bold;" class="tulisan-popup">Workplace Safety:</p>Absorbents
                                contribute to creating a safer work environment by swiftly containing spills and
                                minimizing slip and fall hazards. Whether in industrial settings, laboratories, or
                                commercial spaces, the quick response enabled by absorbents helps prevent accidents and
                                injuries.
                            </li>
                            <li>
                                <p style="font-weight: bold;" class="tulisan-popup">Cost Savings in Cleanup:</p>Timely
                                and effective spill containment with absorbents reduces the extent of cleanup required.
                                This can result in cost savings by minimizing the amount of contaminated material,
                                reducing disposal costs, and lowering the overall expenses associated with spill
                                response and remediation.
                            </li>
                            <li>
                                <p style="font-weight: bold;" class="tulisan-popup">Reputation Management:</p>
                                Demonstrating a commitment to responsible environmental practices enhances an individual
                                or organization’s reputation. Customers, clients, and the community appreciate
                                businesses that prioritize environmental stewardship and take proactive measures to
                                prevent and address spills.
                            </li>
                        </ul>
                        <!-- Close Button -->
                    </div>
                </div>
                <!-- END POP UP -->

            </div>
        </div>
    </section>

    <!-- end benefit section -->

    <!-- Purpose section -->

    <section class="service_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Purpose</h2>
            </div>

            <div class="row">
                <!-- Pop-Up Content -->
                <!-- Pop-up Oil -->
                <div id="popupoil" class="popup">
                    <div class="popup-content">
                        <div class="popup-body">
                            <span class="close" onclick="closePopup('popupoil')">&times;</span>
                            <div class="left-column">
                                <img src="{{ asset('frontend/images/oilabsorbentpad.png') }}"
                                    alt="Oil Absorbent Solutions">
                                <h2 class="judul-popup">Oil Absorbent</h2>
                                <h5 class="motto-popup"><strong>Effortlessly Combat Oil Spills with Our High
                                        Performance Oil Absorbent Solutions</strong></h5>
                            </div>
                            <div class="right-column text-container">
                                <p class="key-feature"><strong>Key Features:</strong></p>
                                <p class="tulisan-popup"><strong>Effective Oil Absorption:</strong></p>
                                <p>Our products are engineered for optimal oil absorption, utilizing advanced absorbent
                                    technology to ensure maximum uptake of oil from various surfaces. This makes them
                                    highly effective in situations where thorough and rapid cleaning is essential.</p>
                                <p class="tulisan-popup"><strong>Water Repellent:</strong></p>
                                <p>In addition to absorbing oil, our products are designed to repel water. This is
                                    crucial for ensuring that water does not mix with the oil being absorbed, thus
                                    improving cleaning efficiency and reducing the amount of absorbent material needed.
                                </p>
                                <p class="tulisan-popup"><strong>Marine and Industrial Performance:</strong></p>
                                <p>Our solutions are ideal for both marine and industrial environments. In marine
                                    settings, our products help manage oil spills in water bodies, while in industrial
                                    settings, they effectively address oil spills in production facilities, warehouses,
                                    and other work areas.</p>
                                <p class="tulisan-popup"><strong>Environmental Compliance:</strong></p>
                                <p>Using our absorbents helps ensure compliance with stringent environmental
                                    regulations. We understand the importance of adhering to environmental laws and
                                    standards, and our products are designed to support responsible waste management
                                    practices.</p>
                                <p class="tulisan-popup"><strong>Swift and Effective Response:</strong></p>
                                <p>Our oil absorbents allow for quick response to oil spills. They enable fast and
                                    effective cleanup, minimizing environmental impact and improving the safety of
                                    affected areas.</p>
                                <p class="key-feature"><strong>Benefits of Using Our Solutions:</strong></p>
                                <p class="tulisan-popup"><strong>Efficiency:</strong></p>
                                <p>Our products reduce the time and effort required for cleanup, providing a practical
                                    and effective solution for managing oil spills.</p>
                                <p class="tulisan-popup"><strong>Safety:</strong></p>
                                <p>By ensuring compliance with environmental regulations and minimizing contamination
                                    risks, our products contribute to environmental protection.</p>
                                <p class="tulisan-popup"><strong>Use:</strong></p>
                                <p>Suitable for various scenarios, whether on water or in industrial locations, our
                                    products offer flexibility and reliability.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="popupchemical" class="popup">
                    <div class="popup-content">
                        <div class="popup-body">
                            <span class="close" onclick="closePopup('popupoil')">&times;</span>
                            <div class="left-column">
                                <img src="{{ asset('frontend/images/chemicalabsorbentpad.png') }}"
                                    alt="Chemical Absorbent Solutions">
                                <h2 class="judul-popup">Chemical Absorbent</h2>
                                <h5 class="motto-popup"><strong>Effectively Manage Chemical Spills with Our Advanced
                                        Chemical Absorbent Solutions</strong></h5>
                            </div>
                            <div class="right-column text-container">
                                <p class="key-feature"><strong>Key Features:</strong></p>
                                <p class="tulisan-popup"><strong>Rapid Chemical Neutralization:</strong></p>
                                <p>Our absorbent solutions are specially formulated to quickly neutralize and absorb a
                                    wide range of hazardous chemicals, including acids, bases, and aggressive
                                    substances. This ensures fast and effective cleanup in critical situations.</p>
                                <p class="tulisan-popup"><strong>Versatile Application:</strong></p>
                                <p>Designed for diverse environments, our products are suitable for both marine and
                                    industrial settings. They are effective in handling chemical spills on water, in
                                    production facilities, warehouses, and other work areas.</p>
                                <p class="tulisan-popup"><strong>Environmental Compliance:</strong></p>
                                <p>Our chemical absorbents help you adhere to strict environmental regulations by
                                    managing spills responsibly. They are crafted to support eco-friendly practices and
                                    ensure safe disposal of hazardous materials.</p>
                                <p class="tulisan-popup"><strong>Enhanced Safety:</strong></p>
                                <p>By minimizing risks and ensuring quick containment of chemical spills, our products
                                    contribute to a safer working environment and reduce potential hazards.</p>
                                <p class="key-feature"><strong>Benefits of Using Our Solutions:</strong></p>
                                <p class="tulisan-popup"><strong>Efficiency:</strong></p>
                                <p>Our solutions streamline the cleanup process, saving time and effort while delivering
                                    reliable performance in managing chemical spills.</p>
                                <p class="tulisan-popup"><strong>Flexibility:</strong></p>
                                <p>Our chemical absorbents are versatile, providing effective spill management across
                                    various scenarios, from marine environments to industrial sites.</p>
                                <p class="tulisan-popup"><strong>Regulatory Adherence:</strong></p>
                                <p>Our products support compliance with environmental laws and safety standards,
                                    promoting responsible and effective waste management practices.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="popupuniversall" class="popup">
                    <div class="popup-content">
                        <div class="popup-body">
                            <span class="close" onclick="closePopup('popupoil')">&times;</span>
                            <div class="left-column">
                                <img src="{{ asset('frontend/images/universallabsorbentpad.png') }}"
                                    alt="Universal Absorbent Solutions">
                                <h2 class="judul-popup">Universal Absorbent</h2>
                                <h5 class="motto-popup"><strong>Versatile Spill Management with Our High-Performance
                                        Universal Absorbent Solutions</strong></h5>
                            </div>
                            <div class="right-column text-container">
                                <p class="key-feature"><strong>Key Features:</strong></p>
                                <p class="tulisan-popup"><strong>Broad Absorption Capability:</strong></p>
                                <p>Our universal absorbents are designed to handle a wide variety of spills, including
                                    water-based liquids, oils, and chemicals. This versatility ensures that they are
                                    effective in many different environments and situations.</p>
                                <p class="tulisan-popup"><strong>Adaptable for Various Environments:</strong></p>
                                <p>Our products are suitable for use in both industrial and marine settings. Whether
                                    dealing with spills in workshops, garages, production facilities, or on water
                                    surfaces, they provide reliable and efficient cleanup solutions.</p>
                                <p class="tulisan-popup"><strong>Ease of Use:</strong></p>
                                <p>Our universal absorbents are easy to deploy and manage, making them a practical
                                    choice for quick and effective spill response. Their user-friendly design ensures
                                    that cleanup is straightforward and efficient.</p>
                                <p class="tulisan-popup"><strong>Environmental Safety:</strong></p>
                                <p>Designed to adhere to environmental regulations, our absorbents support responsible
                                    waste management practices. They help minimize environmental impact by efficiently
                                    managing spills and facilitating safe disposal.</p>
                                <p class="key-feature"><strong>Benefits of Using Our Solutions:</strong></p>
                                <p class="tulisan-popup"><strong>Comprehensive Coverage:</strong></p>
                                <p>Our universal absorbents offer broad coverage for various types of spills, ensuring
                                    that you are prepared for different spill scenarios with a single, versatile
                                    solution.</p>
                                <p class="tulisan-popup"><strong>Efficiency:</strong></p>
                                <p>Streamline your spill management process with our high-performance absorbents, which
                                    save time and effort while providing effective and reliable performance.</p>
                                <p class="tulisan-popup"><strong>Flexibility:</strong></p>
                                <p>Our universal absorbents adapt to diverse situations, from industrial environments to
                                    marine applications, offering a flexible solution for effective spill control.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Boxes -->
                <div class="col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('frontend/images/oilabsorbentpad.png') }}" alt=""
                                width="200px" height="200px" />
                        </div>
                        <div class="detail-box">
                            <h6>Oil Absorbent</h6>
                            <p>Quickly manage oil spills with our effective absorbent solutions. Designed to absorb oil
                                and repel water, our products are perfect for marine and industrial settings, ensuring
                                clean surfaces and regulatory compliance. Choose our absorbents for fast and efficient
                                cleanup.</p>
                            <a href="javascript:void(0);" onclick="openPopup('popupoil')">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('frontend/images/chemicalabsorbentpad.png') }}" alt=""
                                width="200px" height="200px" />
                        </div>
                        <div class="detail-box">
                            <h6>Chemical Absorbent</h6>
                            <p>Efficiently manage chemical spills with our high-performance absorbent solutions.
                                Engineered to neutralize and absorb a range of chemicals, our products are well-suited
                                for marine and industrial environments, ensuring clean surfaces and adherence to
                                regulations. Quick and effective cleanup.</p>
                            <a href="javascript:void(0);" onclick="openPopup('popupchemical')">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('frontend/images/universallabsorbentpad.png') }}" alt=""
                                width="200px" height="200px" />
                        </div>
                        <div class="detail-box">
                            <h6>Universal Absorbent</h6>
                            <p>Effectively handle a wide range of spills with our versatile absorbent solutions.
                                Designed to manage water-based liquids, oils, and chemicals, our products are ideal for
                                various environments, including marine and industrial settings. They ensure thorough
                                cleanup and support compliance with regulations.</p>
                            <a href="javascript:void(0);" onclick="openPopup('popupuniversall')">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end purpose section -->


    <!-- client section -->

    <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Brands We Work With</h2>
            </div>
            <div id="brandCarousel" class="carousel slide" data-ride="carousel" data-interval="3000"
                data-pause="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <div class="box d-flex justify-content-center align-items-center">
                                    <div class="img-box">
                                        <img src="{{ asset('frontend/images/wilmar.png') }}" alt="Wilmar"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="box d-flex justify-content-center align-items-center">
                                    <div class="img-box">
                                        <img src="{{ asset('frontend/images/adhimix.png') }}" alt="Adhimix"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="box d-flex justify-content-center align-items-center">
                                    <div class="img-box">
                                        <img src="{{ asset('frontend/images/inti_karya_jaya.png') }}"
                                            alt="Inti Karya Jaya" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="box d-flex justify-content-center align-items-center">
                                    <div class="img-box">
                                        <img src="{{ asset('frontend/images/kag.jpg') }}" alt="KAG"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="box d-flex justify-content-center align-items-center">
                                    <div class="img-box">
                                        <img src="{{ asset('frontend/images/nestle.png') }}" alt="Nestle"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <div class="box d-flex justify-content-center align-items-center">
                                    <div class="img-box">
                                        <img src="{{ asset('frontend/images/pelindo.png') }}" alt="Pelindo"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="box d-flex justify-content-center align-items-center">
                                    <div class="img-box">
                                        <img src="{{ asset('frontend/images/pertamina.png') }}" alt="Pertamina"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="box d-flex justify-content-center align-items-center">
                                    <div class="img-box">
                                        <img src="{{ asset('frontend/images/ricon_masistan.png') }}"
                                            alt="Ricon Masistan" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="box d-flex justify-content-center align-items-center">
                                    <div class="img-box">
                                        <img src="{{ asset('frontend/images/sucofindo.png') }}" alt="Sucofindo"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="box d-flex justify-content-center align-items-center">
                                    <div class="img-box">
                                        <img src="{{ asset('frontend/images/surya_jaya_perkasa.png') }}"
                                            alt="Surya Jaya Perkasa" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan item lainnya jika diperlukan -->
                </div>
            </div>
        </div>
    </section>





    <!-- end client section -->

    {{-- <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="contact_bg_box">
      <div class="img-box">
        <img src="images/contact-bg.jpg" alt="">
      </div>
    </div>
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Ask Us Anything
        </h2>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-7 mx-auto">
            <form id="contactForm">
              <div class="contact_form-container">
                <div>
                  <input type="text" id="name" placeholder="Full Name" required />
                </div>
                <div>
                  <input type="email" id="email" placeholder="Email" required />
                </div>
                <div>
                  <input type="text" id="phone" placeholder="Phone Number" required />
                </div>
                <div class="">
                  <input type="text" id="message" placeholder="Message" class="message_input" />
                </div>
                <div class="btn-box">
                  <button type="button" id="sendButton">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section --> --}}

    @include('frontend.info')
    @include('frontend.footer')


    @if (session('success'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif


    <script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script> <!-- Link ke file JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    @if (session('success'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif

    @if (session('login_success'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Welcome!',
                    text: "{{ session('login_success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
</body>

</html>
