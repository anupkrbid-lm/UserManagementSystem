@extends('layouts.app')


@section('content')

<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name">{{ $title_cms->title }}</span>
                        <hr class="star-light">
                        <span class="skills">{{ $title_cms->sub_title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Portfolio</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <!-- Foreach Portfolio Modals -->
                @foreach($portfolios as $portfolio)
                    @if($portfolio->p_pos)
                        <div class="col-sm-4 portfolio-item">
                            <a href="#portfolioModal<?php echo $portfolio->id;?>" class="portfolio-link" data-toggle="modal">
                                <div class="caption">
                                    <div class="caption-content">
                                        <i class="fa fa-search-plus fa-3x"></i>
                                    </div>
                                </div>
                                <img src="{{ Storage::disk('custom')->url($portfolio->image) }}" class="img-responsive" alt="">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About Us</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2" style="text-align: justify">
                    {!! $aboutus_cms->left_block !!}
                </div>
                <div class="col-lg-4" style="text-align: justify;">
                    {!! $aboutus_cms->right_block !!}
                </div>
    <!--    Download Theme Button
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#" class="btn btn-lg btn-outline">
                        <i class="fa fa-download"></i> Download Theme
                    </a>
                </div>
    -->        
            </div>    
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Us</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Chat Option -->
    <section style="position: absolute; z-index: 100; bottom: : 0px; right: 0px;" >
        <div id="live-chat">
            <header class="clearfix">    
                <a href="#" class="chat-close">x</a>
                <h4>John Doe</h4>
                <span class="chat-message-counter">3</span>
            </header>

            <div class="chat">            
                <div class="chat-history">
                    <div class="chat-message clearfix">
                        <img src="http://lorempixum.com/32/32/people" alt="" width="32" height="32">
                        <div class="chat-message-content clearfix">
                            <span class="chat-time">13:35</span>
                            <h5>John Doe</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, explicabo quasi ratione odio dolorum harum.</p>
                        </div> <!-- end chat-message-content -->
                    </div> <!-- end chat-message -->
                    <hr>
                    <div class="chat-message clearfix">
                        <img src="http://gravatar.com/avatar/2c0ad52fc5943b78d6abe069cc08f320?s=32" alt="" width="32" height="32">
                        <div class="chat-message-content clearfix">
                            <span class="chat-time">13:37</span>
                            <h5>Marco Biedermann</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, nulla accusamus magni vel debitis numquam qui tempora rem voluptatem delectus!</p>
                        </div> <!-- end chat-message-content -->
                    </div> <!-- end chat-message -->
                    <hr>
                    <div class="chat-message clearfix">
                        <img src="http://lorempixum.com/32/32/people" alt="" width="32" height="32">
                        <div class="chat-message-content clearfix">
                            <span class="chat-time">13:38</span>
                            <h5>John Doe</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                        </div> <!-- end chat-message-content -->
                    </div> <!-- end chat-message -->
                    <hr>
                </div> <!-- end chat-history -->
                <br/>
                <p class="chat-feedback">Your partner is typing…</p>
                <form action="#" method="post">
                    <fieldset>
                        <textarea type="text" placeholder="Type your message…" autofocus  style="color: #9a9a9a"></textarea>
                        <button type="submit">
                            Send
                        </button>
                        <input type="hidden">
                    </fieldset>
                </form>
            </div> <!-- end chat -->
        </div> <!-- end live-chat -->
    </section>


    <!-- Portfolio Modals -->
    @foreach($portfolios as $portfolio)
        @if($portfolio->p_pos)
            <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $portfolio->id;?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <h2>{{ $portfolio->project_title }}</h2>
                                    <hr class="star-primary">
                                    <img src="{{ Storage::disk('custom')->url($portfolio->image) }}" class="img-responsive img-centered" alt="">
                                    {!! $portfolio->description !!}
                                    <ul class="list-inline item-details">
                                        <li>Client:
                                            <strong>{{ $portfolio->client }}
                                            </strong>
                                        </li>
                                        <li>Project Link:
                                            <strong><a target="_blank" href="//{{ $portfolio->project_link }}">visit</a>
                                            </strong>
                                        </li>
                                        <li>Technology:
                                            <strong>{!! $portfolio->project_details !!}
                                            </strong>
                                        </li>
                                    </ul>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
   
@include('includes.home.footer_home')

@endsection


