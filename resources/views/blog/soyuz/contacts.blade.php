@extends('blog.soyuz.layouts.layouts')

@section('content')
            <!-- Contact Us -->
            <div class="container contact-us" id="contactSc">
               <div class="row">
                  <div class = "col-xs-12 col-sm-12 col-md-12 title">                      
                     <p>Контакти</p>
                     <hr>
                     <p>В цьому розділі розміщена контактна інформація</p>
                  </div>         
               </div>
                @include('blog.soyuz.result_messages')
               <div class="row contact-row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 contact-info">
                     <h2>Контактна інформація:</h2>
                     <div class="c_info">
                        <section class="contact_icon"><i class="fa fa-map-marker" aria-hidden="true"></i></section>
                        <section class="c_p">
                           <p>15558 с.Гончарівське<br>вул. Танкістів 88</p>
                        </section>
                        <hr>
                     </div>
                     <div class="c_info">
                        <section class="contact_icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></section>
                        <section class="c_p">
                           <p>woodynet@ukr.net</p>
                        </section>
                        <hr>
                     </div>
                     <div class="c_info">
                        <section class="contact_icon"><i class="fa fa-globe" aria-hidden="true"></i></section>
                        <section class="c_p">
                           <p>woody.net.ua</p>
                        </section>
                        <hr>
                     </div>
                     <div class="c_info">
                        <section class="contact_icon"><i class="fa fa-phone" aria-hidden="true"></i></section>
                        <section class="c_p">
                            <p>+38 (068) 388-23-00 <br> +38 (093) 975-36-91</p>
                        </section>
                     </div>
                  </div>
<!--                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 contact-input">
                     <h2>Форма зворотнього зв'язку</h2>
                     <form method="POST" action="{{ route('contacts') }}" >
                         @csrf
                        <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-6 input_contact">
                           <input
                              name="name" 
                              type="text" 
                              value="Імя" 
                              onblur="if (this.value=='') this.value = 'Імя'"  
                              onfocus="if (this.value=='Імя') this.value = ''">
                           <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-6 input_contact">
                           <input name="phone" 
                              type="text" 
                              value="Телефон"
                              onblur="if (this.value=='') this.value = 'Телефон'" 
                              onfocus="if (this.value=='Телефон') this.value = ''">
                           <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 input_contact">
                           <input name="email" 
                              type="email" 
                              value="Email"
                              onblur="if (this.value=='') this.value = 'Email'" 
                              onfocus="if (this.value=='Email') this.value = ''">
                           <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
                           <textarea name = "message" 
                              onblur="if (this.value=='') this.value = 'Повідомлення'" 
                              onfocus="if (this.value=='Повідомлення') this.value = ''" >Повідомлення</textarea>
                        </div>
                        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
                           {!! app('captcha')->render('uk') !!}
                        </div>
                        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
                           <input id="send" type = "submit" value = "Надіслати" >
                        </div>
                     </form>-->
                  <!--</div>-->
               </div>
            </div>
@endsection