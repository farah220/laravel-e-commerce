
<header class="header">
    <div class="header_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo"><a href="{{ route('web.index') }}">Sublime.</a></div>
                        <nav class="main_nav">
                            <ul>
                                <li class="hassubs active">
                                    <a href="{{ route('web.index') }}">Home</a>

                                </li>

                                <li><a href="{{ route('web.contact.index') }}">Contact</a></li>
                            </ul>
                        </nav>
                        @if(auth()->check())
                        <div class="header_extra ml-auto">
                            <div class="shopping_cart">
                                <a href="{{ route('web.cart.index') }}">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
											<g>
                                                <path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
													c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
													C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
													H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
													c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z"/>
                                            </g>

										</svg>
{{--                                    @if(count(auth()->user()->cart) !== "0")--}}
{{--                                    <div>Cart <span>({{count(auth()->user()->cart)}})</span></div>--}}
{{--                                    @endif--}}
                                </a>
                            </div>
                            @endif
                            <div class="search">
                                <div class="search_icon">
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 475.084 475.084" style="enable-background:new 0 0 475.084 475.084;"
                                         xml:space="preserve">
										<g>
                                            <path d="M464.524,412.846l-97.929-97.925c23.6-34.068,35.406-72.047,35.406-113.917c0-27.218-5.284-53.249-15.852-78.087
												c-10.561-24.842-24.838-46.254-42.825-64.241c-17.987-17.987-39.396-32.264-64.233-42.826
												C254.246,5.285,228.217,0.003,200.999,0.003c-27.216,0-53.247,5.282-78.085,15.847C98.072,26.412,76.66,40.689,58.673,58.676
												c-17.989,17.987-32.264,39.403-42.827,64.241C5.282,147.758,0,173.786,0,201.004c0,27.216,5.282,53.238,15.846,78.083
												c10.562,24.838,24.838,46.247,42.827,64.234c17.987,17.993,39.403,32.264,64.241,42.832c24.841,10.563,50.869,15.844,78.085,15.844
												c41.879,0,79.852-11.807,113.922-35.405l97.929,97.641c6.852,7.231,15.406,10.849,25.693,10.849
												c9.897,0,18.467-3.617,25.694-10.849c7.23-7.23,10.848-15.796,10.848-25.693C475.088,428.458,471.567,419.889,464.524,412.846z
												 M291.363,291.358c-25.029,25.033-55.148,37.549-90.364,37.549c-35.21,0-65.329-12.519-90.36-37.549
												c-25.031-25.029-37.546-55.144-37.546-90.36c0-35.21,12.518-65.334,37.546-90.36c25.026-25.032,55.15-37.546,90.36-37.546
												c35.212,0,65.331,12.519,90.364,37.546c25.033,25.026,37.548,55.15,37.548,90.36C328.911,236.214,316.392,266.329,291.363,291.358z
												"/>
                                        </g>
									</svg>
                                </div>
                            </div>
                            <div class="auth">

                                @if( !auth()->check() )
                               <button type="button"  class="btn bg-transparent" style="cursor:pointer" data-toggle="modal" data-target="#login-modal">
                                   <i class="fa fa-sign-in" ></i>
                               </button>
                                <button type="button" class="btn bg-transparent" style="cursor:pointer" data-toggle="modal" data-target="#register-modal">
                                   <i class="fa fa-user" ></i>
                               </button>
                                @else
                                <form action="{{ route('web.logout') }}" method="POST">
                                @csrf
                                    <button type="submit" class="btn bg-transparent" style="cursor:pointer" >
                                       <i class="fa fa-sign-out" ></i>
                                    </button>
                                    <span> Hey,{{auth()->user()->name }}</span>
                                </form>
                                @endif
                            </div>
                            <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Panel -->
    <div class="search_panel trans_300">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="search_panel_content d-flex flex-row align-items-center justify-content-end">
                        <form action="/search">
                            <input type="text" class="search_input" name="search_term" placeholder="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Social -->
    <div class="header_social">
        <ul>
            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        </ul>
    </div>
</header>

<!-- login modal -->
<div class="modal fade @if( ($errors->has('email') || $errors->has('password') )  && (session()->get('prev_submitted_url') == 'login')  ) show d-block @endif" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Log in</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="$('#login-modal').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="contact_form_container">
                    <form action="{{ route('web.login') }}" method="POST"  class="contact_form">
                        @csrf
                        <div class="row p-3">
                            <div class="col-12">
                                <!-- Name -->
                                <label for="contact_name">Email*</label>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                                @error('email')
                                <p class="text-danger"> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-12 mt-3">
                                <!-- Last Name -->
                                <label for="contact_last_name">Password*</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                <p class="text-danger"> {{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark">Log IN</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- login modal -->

<!-- register modal-->
<div class="modal fade @if( ($errors->has('name') || $errors->has('email') || $errors->has('password') || $errors->has('password_confirmation'))  && (session()->get('prev_submitted_url') == 'register')  ) show d-block @endif "  id="register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="$('#register-modal').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="contact_form_container">
                    <form action="{{ route('web.register') }}" method="POST"  class="contact_form">
                        @csrf
                        <div class="row p-3">
                            <div class="col-12">
                                <!-- Name -->
                                <label for="contact_name">Name*</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                <p class="text-danger"> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-12 mt-3">
                                <!-- Email -->
                                <label for="contact_last_name">Email*</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                <p class="text-danger"> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-12 mt-3">
                                <!-- password -->
                                <label for="contact_last_name">Password*</label>
                                <input type="password" class="form-control" name="password">
                                @error('password')
                                <p class="text-danger"> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-12 mt-3">
                                <!-- cofirm password -->
                                <label for="contact_last_name">Confirm password*</label>
                                <input type="password" class="form-control" name="password_confirmation">
                                @error('password_confirmation')
                                    <p class="text-danger"> {{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- register modal-->
