<div class="popup-box chat-popup" id="qnimate" style="border: 3px solid black;">
              <div class="popup-head" style="position: relative">

                <div class="popup-head-left pull-left">

                     
                </div>
                <div id="status" style="position: absolute; top: 30px; font-size: 10px;">
                        
                </div>  
                <div class="popup-head-right pull-right">
                    <div class="btn-group">
                      <button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
                       <i class="glyphicon glyphicon-cog"></i> </button>
                       <ul role="menu" class="dropdown-menu pull-right">
                        <li><a href="#">Media</a></li>
                        <li><a href="#">Block</a></li>
                        <li><a href="#">Clear Chat</a></li>
                        <li><a href="#">Email Chat</a></li>
                    </ul>
                </div>

                <button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-off"></i></button>
            </div>
        </div>
        <div class="popup-messages" style="overflow: auto">
            <?php 
            $a = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
            ?>
            <input type="hidden" name="my_id" id="my_id" value="<?php echo $a; ?>"> 
            <div class="col-md-12" id="messages" style="margin-top: 5px; margin-bottom: 15px;">
                <div class="message-wrapper">
                    <ul class="messages">
                                <!-- <li class="message clearfix">
                                    <div class="sent">
                                        <p>Lorem ispum</p>
                                        <p class="date">1 sep 2020</p>
                                    </div>
                                </li>

                                <li class="message clearfix">
                                    <div class="received">
                                        <p>Lorem ispum</p>
                                        <p class="date">1 sep 2020</p>
                                    </div>
                                </li> -->
                            </ul>
                        </div>

                        

                    </div>











                </div>
                <div class="popup-messages-footer">
                    <!-- <textarea id="status_message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea> -->

                    <!-- <input type="submit" name="submit" value="Gửi"> -->

                    <div class="btn-footer">
                        <div class="input-text col-md-12">
                            <input type="text" name="message" class="submit col-md-12" style="border: 3px solid black;" id="typeMessage" placeholder="Enter to send Message" autocomplete="off">
                            <!-- <input type="submit" name="submit" value="Gửi" class="col-md-2 btn btn-primary" style="margin-left: 10px; margin-top: 9px; width: 100%; height: 100%;"> -->
                        </div>
                <!-- <button class="bg_none"><i class="glyphicon glyphicon-film"></i> </button>
                <button class="bg_none"><i class="glyphicon glyphicon-camera"></i> </button>
                <button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i> </button>
                <button class="bg_none pull-right"><i class="glyphicon glyphicon-thumbs-up"></i> </button> -->
            </div>
        </div>
    </div>