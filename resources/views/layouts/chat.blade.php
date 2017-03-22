    <!-- Chat Option -->
    <section style="position: absolute; z-index: 100; bottom: : 0px; right: 0px;" >
        <div id="live-chat">
            <header class="clearfix">    
                <a href="#" class="chat-close">x</a>
                <h4>Admin</h4>
                <span class="chat-message-counter">3</span>
            </header>

            <div class="chat">            
                <div class="chat-history">
                    <div class="chat-message clearfix">
                        <img src="chat/user-logo.png" alt="" width="32" height="32"> 
                        <div class="chat-message-content clearfix">
                            <span class="chat-time" style="color: #18BC9C">13:35</span>
                            <h5 style="color: #18BC9C">John Doe</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, explicabo quasi ratione odio dolorum harum.</p>
                        </div> <!-- end chat-message-content -->
                    </div> <!-- end chat-message -->
                    <hr style="color: black; height: 1px;">
                    <div class="chat-message clearfix">
                        <img src="chat/computer-user.png" alt="" width="32" height="32">
                        <div class="chat-message-content clearfix">
                            <span class="chat-time"style="color: #18BC9C">13:37</span>
                            <h5 style="color: #18BC9C">Admin</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, nulla accusamus magni vel debitis numquam qui tempora rem voluptatem delectus!</p>
                        </div> <!-- end chat-message-content -->
                    </div> <!-- end chat-message -->
                    <hr style="color: black; height: 1px;">
                </div> <!-- end chat-history -->
                <br>
                <p class="chat-feedback" style="color: #18BC9C;">Admin is typing…</p>
                <form action="#" method="post">
                    <fieldset>
                        <textarea type="text" placeholder="Type your message…" autofocus  style="color: #9a9a9a"></textarea>
                        <button class="btn btn-success pull-right" type="submit" style="margin-top: 2px; padding: 6px 6px 6px 6px;">
                            Send
                        </button>
                        <input type="hidden">
                    </fieldset>
                </form>
            </div> <!-- end chat -->
        </div> <!-- end live-chat -->
    </section>