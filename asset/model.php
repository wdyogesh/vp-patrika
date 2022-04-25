<!--Personal model to update details-->
<div class="modal fade" id="PersonalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="myModalLabel">Update Personal Details</h5>
            </div>
            <div class="modal-body">
                <div id="modal-loader" style="display: none; text-align: center;">
                    <img src="ajax-loader.gif">
                </div>
                <div id="dynamic-content"></div>
            </div>
        </div>
    </div>
</div>
<!--education model to update details-->

<div class="modal fade" id="EducationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="myModalLabel">Update Education Details</h5>
            </div>
            <div class="modal-body">
                <div id="modal-loader" style="display: none; text-align: center;">
                    <img src="assets/images/ajax-loader.gif">
                </div>
                <div id="dynamic-content-edu"></div>
            </div>
        </div>
    </div>
</div>


<!--Family model to update details-->
<div class="modal fade" id="FamilyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="myModalLabel">Update Family Details</h5>
            </div>
            <div class="modal-body">
                <div id="modal-loader" style="display: none; text-align: center;">
                    <img src="assets/images/ajax-loader.gif">
                </div>
                <div id="dynamic-content-fm"></div>
            </div>
        </div>
    </div>
</div>

<!--Address model to update details-->
<div class="modal fade" id="AddressModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="myModalLabel">Update Address Details</h5>
            </div>
            <div class="modal-body">
                <div id="modal-loader" style="display: none; text-align: center;">
                    <img src="assets/images/ajax-loader.gif">
                </div>
                <div id="dynamic-content-add"></div>
            </div>
        </div>
    </div>
</div>

<!--About model to update details-->
<div class="modal fade" id="AboutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="myModalLabel">Update About Details</h5>
            </div>
            <div class="modal-body">
                <div id="modal-loader" style="display: none; text-align: center;">
                    <img src="assets/images/ajax-loader.gif">
                </div>
                <div id="dynamic-content-about"></div>
            </div>
        </div>
    </div>
</div>

<!--PartnerModal model to update details-->
<div class="modal fade" id="PartnerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="myModalLabel">Update Partner Preference Details</h5>
            </div>
            <div class="modal-body">
                <div id="modal-loader" style="display: none; text-align: center;">
                    <img src="assets/images/ajax-loader.gif">
                </div>
                <div id="dynamic-content-part"></div>
            </div>
        </div>
    </div>
</div>

<!--Contact model to update details-->
<div class="modal fade" id="ContactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="myModalLabel">Update Contact Details</h5>
            </div>
            <div class="modal-body">
                <div id="modal-loader" style="display: none; text-align: center;">
                    <img src="assets/images/ajax-loader.gif">
                </div>
                <div id="dynamic-content-contact"></div>
            </div>
        </div>
    </div>
</div>

<!--Delete My Account Details-->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="myModalLabel">Delete My Account</h5>
            </div>
            <div class="modal-body">
                <form class="custom-form" id="delete-details-form" role="form">
                    <div class="form-group">
                        <input type="hidden" id="user_id" name="id">
                        <input type="hidden" id="delete_profile" name="delete_profile">
                        <label for="Mobile"> Why Do You Want Your Account ? </label>
                        <div>
                            <label  class="radio radio-inline"><input type="radio" name="why_delete" value="Marrige Is Fixed."> Marrige Is Fixed.</label>
                            <label  class="radio radio-inline"><input type="radio" name="why_delete" value="Website Is not Usefull for me."> Website Is not Usefull for me. </label>
                            <label  class="radio radio-inline"><input type="radio" name="why_delete" value="Other Problem."> Other Problem. </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Mobile">Write your feedback <span class="form-required" title="This field is required."> </span></label>
                        <textarea required class="form-control" name="feedback" id="" cols="30" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary custom-btn">Submit</button>
                    <button type="button" data-dismiss="modal" class="btn btn-default custom-btn">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Uppdate password Details-->
<div class="modal fade" id="PasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="myModalLabel">Update Password Details</h5>
            </div>
            <div class="modal-body">
                <form class="custom-form" id="password-details-form" role="form">
                    <span class="alertMessage"></span>
                    <div class="form-group">
                        <input type="hidden" id="user" name="id" >
                        <label for="password"> Present Password: <span class="form-required" title="This field is required.">*</span></label>
                        <input required name="prePass" autofocus = "none" autocomplete="none" type="password" id="passPre"  class="form-text required">
                    </div>
                    <div class="form-group">
                        <label for="Mobile"> Enter New Password:</label>
                        <input id="pass1" onchange="(this,'validatePassword')" required autofocus = "none" autocomplete="none" type="password" name="newPassword" class="form-text required">
                    </div>
                    <div class="form-group">
                        <label for="Mobile"> Enter Confirm Password:</label>
                        <input id="pass2" required autofocus = "none" onkeyup="checkPass(); return false;" autocomplete="none" type="password" name="confirmPassword" class="form-text required">
                        <span id="confirmMessage" class="confirmMessage"></span>
                    </div>
                    <button type="submit" class="btn btn-primary custom-btn">Submit</button>
                    <button type="button" data-dismiss="modal" class="btn btn-default custom-btn">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- uploaded images -->
<div class="modal fade" id="ImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="myModalLabel">Update Images</h5>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data"  class="custom-form"  id="images_upload_form" role="form">
                    <span class="alertMessage"></span>
                    <div class="form-group">
                        <input type="hidden" id="upload_user_file" name="upload_user_file" >
                        <label for="password"> Upload Images: <span class="form-required" title="This field is required.">*</span></label>
                        <p id="error1" style="display:none; color:#FF0000;">Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.</p>
                        <p id="error2" style="display:none; color:#FF0000;">Maximum File Size Limit is 1MB.</p>
                        <input required name="image" autofocus = "none" autocomplete="none" type="file" id="upload_user_image"  class="form-control required">
                    </div>
                    <button id="btn-submit" type="submit" class="btn btn-primary custom-btn">Submit</button>
                    <button type="button" data-dismiss="modal" class="btn btn-default custom-btn">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>