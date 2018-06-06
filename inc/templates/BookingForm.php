<?php
/**
 * @package Anila
 *
 */

/* ========================
 * Shortcodes Configuration Page
 * ========================
 */

namespace Inc\templates;

/* ================================
 * Shortcodes Configuration Page
 * =================================
 */
class BookingForm
{
    //private $adm;
    function __construct(){
        //$this   ->  themeUri            =   get_template_directory_uri();
    }
    public function form() {

        echo '<div class="online_reservation">
        <form id="checkinout" action="#" target="_blank">
            <input type="hidden" name="checkin">
            <input type="hidden" name="checkout">



                <div class="reservation">
                    <div class="booking_room">
                        <h4>TITLE</h4>
                        <p>TEXT</p>
                    </div>


                    <div  class="span1_of_1 left">
                        <h5>check-in-date:</h5>
                        <div class="book_date">

                        <input type="text" id="checkin-picker" placeholder="dd mmm yyyy">
                        <i class="fa fa-calendar in" aria-hidden="true"></i>


                        </div>
                    </div>
                    <div  class="span1_of_1 left">
                        <h5>check-out-date:</h5>
                        <div class="book_date">

                        <input type="text" id="checkout-picker" placeholder="dd mmm yyyy">
                        <i class="fa fa-calendar out" aria-hidden="true"></i>

                        </div>
                    </div>
                    <div class="span1_of_1 left">
                        <h5>Adults:</h5>
                        <!-- start section_room -->
                        <div class="section_room">
                        <select id="wh-adults" name="adults">
                            <option value="1">1 adult</option>
                            <option value="2" selected>2 adults</option>
                            <option value="3">3 adults</option>
                            <option value="4">4 adults</option>
                            <option value="5">5 adults</option>
                            <option value="6">6 adults</option>
                            <option value="7">7 adults</option>
                        </select>
                        </div>
                    </div>
                    <div class="span1_of_1 left">
                        <h5>Children:</h5>
                        <!-- start section_room -->
                        <div class="section_room">
                        <select id="wh-children" name="children">
                            <option value="0">no children</option>
                            <option value="1">1 child</option>
                            <option value="2">2 children</option>
                            <option value="3">3 children</option>
                            <option value="4">4 children</option>
                            <option value="5">5 children</option>
                            <option value="6">6 children</option>
                        </select>
                        </div>
                    </div>
                    <div class="span1_of_1 submit-btn">

                            <input class="btn btn-lg btn-booking" type="submit" data-toggle="modal" data-target="#contactModal" value="BOOK NOW" />

                            <div class="number">
                                <span class="phoneRes" data-phone="123456" data-url="some-url">
                                    <a href="tel:123456" hidefocus="true" style="outline: none;"><i class="fa fa-phone" aria-hidden="true"></i>
                                    123456
                                    </a>
                                </span>
                            </div>


                    </div>


                </div>

        </form>
    </div>
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="contactModalLabel">Where do we send the confirmation?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="modal-contact" action="#" data-url="'. admin_url('admin-ajax.php').'">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Your Name:</label>
            <input type="text" class="form-control" id="recipient-name" required>
          </div>
          <div class="form-group">
            <label for="recipient-email" class="col-form-label">Your Email:</label>
            <input type="email" class="form-control" id="recipient-email" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Send" />
      </div>
        </form>
      </div>

    </div>
  </div>
</div>';

    }

}