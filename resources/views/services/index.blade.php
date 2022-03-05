@extends('layouts.app')

@section('content')
    <section>
        <div class="collection-inner">
            <div class="container-inner">
                <div class="container">
                    <div class="collection">
                        <div class="newAdded-inner collectionAll ">
                            <div class="filter_width">
                                <div class="title_fl">
                                    <p>Filter</p>
                                </div>
                                <form action="#">
                                    <div class="choose_specialization">
                                        <div class="select_specialization toggle_class" >
                                            <span>Services</span>
                                            <img class="icon_rotate " src="images/choose.png" alt="choose">
                                        </div>
                                        <div class="specialization" >
                                            <div>
                                                <label for="type_repair">
                                                    <input type="checkbox" name="type_repair" id="type_repair">
                                                    Repair
                                                </label>
                                                <label for="type_clockworker">
                                                    <input type="checkbox" name="type_clockworker" id="type_clockworker">
                                                    Clockworker
                                                </label>
                                                <label for="type_polishing">
                                                    <input type="checkbox" name="type_polishing" id="type_polishing">
                                                    Polishing
                                                </label>
                                                <label for="type_golden_water">
                                                    <input type="checkbox" name="type_golden_water" id="type_golden_water">
                                                    Golden Water
                                                </label>
                                                <label for="type_laser_engraving">
                                                    <input type="checkbox" name="type_laser_engraving" id="type_laser_engraving">
                                                    Laser engraving
                                                </label>
                                                <label for="type_casting">
                                                    <input type="checkbox" name="type_casting" id="type_casting">
                                                    Casting
                                                </label>
                                                <label for="type_resize">
                                                    <input type="checkbox" name="type_resize" id="type_resize">
                                                    Resize
                                                </label>
                                                <label for="type_laser_inspection">
                                                    <input type="checkbox" name="type_laser_inspection" id="type_laser_inspection">
                                                    Laser inspection
                                                </label>
                                                <label for="type_calibration">
                                                    <input type="checkbox" name="type_calibration" id="type_calibration">
                                                    Calibration
                                                </label>
                                                <label for="type_rhodium">
                                                    <input type="checkbox" name="type_rhodium" id="type_rhodium">
                                                    Rhodium
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose_specialization">
                                        <div class="select_specialization toggle_class" >
                                            <span>Country</span>
                                            <img class="icon_rotate " src="images/choose.png" alt="choose">
                                        </div>
                                        <div class="specialization" >
                                            <div>
                                                <label for="country_armenia">
                                                    <input type="checkbox" name="country_armenia" id="country_armenia">
                                                    Armenian
                                                </label>
                                                <label for="country_artsakh">
                                                    <input type="checkbox" name="country_artsakh" id="country_artsakh">
                                                    Artsakh
                                                </label>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="choose_specialization">
                                        <div class="select_specialization toggle_class" >
                                            <span>Region</span>
                                            <img class="icon_rotate " src="images/choose.png" alt="choose">
                                        </div>
                                        <div class="specialization" >
                                            <div>
                                                <label for="region_yerevan">
                                                    <input type="checkbox" name="region_yerevan" id="region_yerevan">
                                                    Yerevan
                                                </label>
                                                <label for="region_aragatsotn">
                                                    <input type="checkbox" name="region_aragatsotn" id="region_aragatsotn">
                                                    Aragatsotn
                                                </label>
                                                <label for="region_ararat">
                                                    <input type="checkbox" name="region_ararat" id="region_ararat">
                                                    Ararat
                                                </label>
                                                <label for="region_armavir">
                                                    <input type="checkbox" name="region_armavir" id="region_armavir">
                                                    Armavir
                                                </label>
                                                <label for="region_gegharkunik">
                                                    <input type="checkbox" name="region_gegharkunik" id="region_gegharkunik">
                                                    Gegharkunik
                                                </label>
                                                <label for="region_kotayk">
                                                    <input type="checkbox" name="region_kotayk" id="region_kotayk">
                                                    Kotayk
                                                </label>
                                                <label for="region_lori">
                                                    <input type="checkbox" name="region_lori" id="region_lori">
                                                    Lori
                                                </label>
                                                <label for="region_shirak">
                                                    <input type="checkbox" name="region_shirak" id="region_shirak">
                                                    Shirak
                                                </label>
                                                <label for="region_syunik">
                                                    <input type="checkbox" name="region_syunik" id="region_syunik">
                                                    Syunik
                                                </label>
                                                <label for="region_tavush">
                                                    <input type="checkbox" name="region_tavush" id="region_tavush">
                                                    Tavush
                                                </label>
                                                <label for="region_vayots_dzor">
                                                    <input type="checkbox" name="region_vayots_dzor" id="region_vayots_dzor">
                                                    Vayots Dzor
                                                </label>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="choose_specialization">
                                        <div class="select_specialization toggle_class" >
                                            <span>City</span>
                                            <img class="icon_rotate " src="images/choose.png" alt="choose">
                                        </div>
                                        <div class="specialization" >
                                            <ul>
                                                <li>
                                                    Alphabetically
                                                </li>
                                                <li>
                                                    Sort by price: low to high
                                                </li>
                                            </ul>

                                        </div>

                                    </div>
                                    <div class="choose_specialization">
                                        <div class="select_specialization toggle_class" >
                                            <span>Market</span>
                                            <img class="icon_rotate " src="images/choose.png" alt="choose">
                                        </div>
                                        <div class="specialization" >
                                            <ul>
                                                <li>
                                                    Alphabetically
                                                </li>
                                                <li>
                                                    Sort by price: low to high
                                                </li>
                                            </ul>

                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="newAdded_sellection">
                                <div>
                                    <a href="services-singel.html">
                                        <div class="slider-item">
                                            <div>
                                                <div class="slider-item-img">
                                                    <img src="images/services-img5.png" alt="collection">
                                                </div>
                                                <div class="slider-item-title">
                                                    <p>Harutyunyan Gevorg</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a href="services-singel.html">
                                        <div class="slider-item">
                                            <div>
                                                <div class="slider-item-img">
                                                    <img src="images/servises-img1.png" alt="collection">
                                                </div>
                                                <div class="slider-item-title">
                                                    <p>Karapetyan Aram</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a href="services-singel.html">
                                        <div class="slider-item">
                                            <div>
                                                <div class="slider-item-img">
                                                    <img src="images/services-img6.png" alt="collection">
                                                </div>
                                                <div class="slider-item-title">
                                                    <p>Aleqsanyan Karen</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a href="services-singel.html">
                                        <div class="slider-item">
                                            <div>
                                                <div class="slider-item-img">
                                                    <img src="images/services-img7.png" alt="collection">
                                                </div>
                                                <div class="slider-item-title">
                                                    <p>Karapetyan Aram</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a href="services-singel.html">
                                        <div class="slider-item">
                                            <div>
                                                <div class="slider-item-img">
                                                    <img src="images/services-img8.png" alt="collection">
                                                </div>
                                                <div class="slider-item-title">
                                                    <p>Aleqsanyan Karen</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a href="services-singel.html">
                                        <div class="slider-item">
                                            <div>
                                                <div class="slider-item-img">
                                                    <img src="images/services-img5.png" alt="collection">
                                                </div>
                                                <div class="slider-item-title">
                                                    <p>Harutyunyan Gevorg</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a href="services-singel.html">
                                        <div class="slider-item">
                                            <div>
                                                <div class="slider-item-img">
                                                    <img src="images/sevices-img3.png" alt="collection">
                                                </div>
                                                <div class="slider-item-title">
                                                    <p>Abrahamyan Aleqs</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a href="services-singel.html">
                                        <div class="slider-item">
                                            <div>
                                                <div class="slider-item-img">
                                                    <img src="images/sevices-img4.png" alt="collection">
                                                </div>
                                                <div class="slider-item-title">
                                                    <p>Karapetyan Aram</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a href="services-singel.html">
                                        <div class="slider-item">
                                            <div>
                                                <div class="slider-item-img">
                                                    <img src="images/servises-img1.png" alt="collection">
                                                </div>
                                                <div class="slider-item-title">
                                                    <p>Aleqsanyan Karen</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a href="services-singel.html">
                                        <div class="slider-item">
                                            <div>
                                                <div class="slider-item-img">
                                                    <img src="images/services-img5.png" alt="collection">
                                                </div>
                                                <div class="slider-item-title">
                                                    <p>Abrahamyan Aleqs</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a href="services-singel.html">
                                        <div class="slider-item">
                                            <div>
                                                <div class="slider-item-img">
                                                    <img src="images/services-img6.png" alt="collection">
                                                </div>
                                                <div class="slider-item-title">
                                                    <p>Karapetyan Aram</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a href="services-singel.html">
                                        <div class="slider-item">
                                            <div>
                                                <div class="slider-item-img">
                                                    <img src="images/services-img7.png" alt="collection">
                                                </div>
                                                <div class="slider-item-title">
                                                    <p>Karapetyan Aram</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
