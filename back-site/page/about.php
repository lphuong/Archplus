<?php
/**
 * Created by PHUONGLQ-SOFTPLUS.
 * User: Admin
 * Date: 7/25/2015
 * Time: 11:21 PM
 */
?>
<div class="secInfo">
    <h1 class="secTitle">About Managers</h1>
    <span class="secExtra">Admin</span>
</div> <!-- /SecInfo -->

<div class="fluid">

    <div class="widget">
        <div class="widget-header">
            <h3 class="widget-title">About</h3>

            <div class="widget-controls">
                <input type="checkbox" class="sl" id="slider-inputs" checked/>
                <label class="slider" for="slider-inputs"></label>

                <div class="btn-group xtra"> <!-- btn dd -->
                    <a href="#" onclick="return false;" class="icon-button dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-gear"></i></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                        <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                        <li><a href="#"><i class="fa fa-ban"></i> Ban</a></li>
                        <li class="divider"></li>
                        <li><a href="#"> Other actions</a></li>
                    </ul>
                </div>
                <!-- /btn dd -->
            </div>
        </div>

        <div class="widget-content pad20f">
            <form id="formPost" method="post" enctype="multipart/form-data">
                <input type="text" name="inputPostTitle" class="input-text" placeholder="Title Post"/>

<!--                <div class="dropdown">-->
<!--                    <select name="inputPostCategory" class="dropdown-select">-->
<!--                        <option value="">Category</option>-->
<!--                        <option value="1">About</option>-->
<!--                        <option value="2">Option #2</option>-->
<!--                        <option value="3">Option #3</option>-->
<!--                    </select>-->
<!--                </div>-->

                <input type="file" name="inputPostUploader" id="inputPostUploader">
                <label id="labelPostUploader" for="inputPostUploader">Uploader Image</label>

                <textarea name="inputPostContent" class="textarea" rows="6" placeholder="Contents Post"></textarea>
            <span class="custom-input">
            	<input type="checkbox" id="inputPostUpdateToApp" name="inputPostUpdateToApp" checked><label
                    for="inputPostUpdateToApp">Update To App</label>
<!--            	<input type="radio" id="radio-1" name="input-radio"><label for="radio-1">Say-->
<!--                    yes!</label>-->
<!--            	<input type="radio" id="radio-2" name="input-radio"><label for="radio-2">Say no-->
<!--                    :( </label>-->
            	<button type="submit" id="btnPostSubmit">Submit</button>
            	<button type="submit" id="btnPostClear">Clear</button>
            </span>
            </form>
        </div>
        <!-- /widget-content -->

        <div class="divider"></div>

    </div>
    <!-- /widget -->

</div> <!-- /fluid -->

</div> <!-- /main -->