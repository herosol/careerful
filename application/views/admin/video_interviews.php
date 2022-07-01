<?php if ($this->uri->segment(3) == 'manage'): ?>
<?= showMsg(); ?>
<?= getBredcrum(ADMIN, array('#' => 'Add/Update Vidoe Interviews')); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-users"></i> Add/Update <strong>Vidoe Interviews</strong></h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="<?= site_url(ADMIN . '/videointerviews'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
    </div>
</div>
<div>
    <hr>
    <div class="row col-md-12">
        <form action=""  role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
            
            <div class="col-md-12">
                <h3><i class="fa fa-bars"></i> Profile Detail</h3>
                <hr class="hr-short">
                <div class="col-md-6">
                    <div style="margin:15px 0px" class="">
                        <div class="panel panel-primary" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Profile Image
                                </div>
                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>
                        </div>
                        <?php
                            get_site_image_src("members", $row->mem_image);
                        ?>
                        <div class="panel-body">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                        <img src="<?= !empty($row->mem_image) ? get_site_image_src("members", $row->mem_image) : 'http://placehold.it/700x620' ?>" alt="--">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                <div>
                                <span class="btn btn-black btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="mem_image" accept="image/*" <?php if(empty($row->mem_image)){echo 'required=""';}?>>
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label class="control-label"> Status</label>
                            <select name="mem_status" id="mem_status" class="form-control">
                                <option value="1" <?php
                                    if (isset($row->mem_status) && '1' == $row->mem_status) {
                                    echo 'selected';
                                    }
                                ?>>Active</option>
                                <option value="0" <?php
                                    if (isset($row->mem_status) && '0' == $row->mem_status) {
                                    echo 'selected';
                                    }
                                ?>>Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label"> Verified</label>
                            <select name="mem_verified" id="mem_verified" class="form-control">
                                <option value="1" <?php
                                    if (isset($row->mem_verified) && '1' == $row->mem_verified) {
                                    echo 'selected';
                                    }
                                ?>>Yes</option>
                                <option value="0" <?php
                                    if (isset($row->mem_verified) && '0' == $row->mem_verified) {
                                    echo 'selected';
                                    }
                                ?>>No</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">Password <span class="symbol required" style="color: red">*</span></label>
                            <?php if ($row->mem_pswd): ?>
                                <input type="text"  name="mem_pswd" value="<?php  if (isset($row->mem_pswd)) echo doDecode($row->mem_pswd);  ?>" class="form-control" autocomplete="off" placeholder="password" required="" >
                            <?php else:?>    
                                <input type="password"  name="mem_pswd" value="<?php  if (isset($row->mem_pswd)) echo doDecode($row->mem_pswd);  ?>" class="form-control" autocomplete="off" placeholder="password" required="" >
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label"> First Name <span class="symbol required" style="color: red">*</span></label>
                            <input type="text" name="mem_fname" value="<?php if (isset($row->mem_fname)) echo $row->mem_fname; ?>" class="form-control" autofocus required>
                        </div>
                        <div class="col-md-6">
                            <label class="control-label"> Last Name <span class="symbol required" style="color: red">*</span></label>
                            <input type="text" name="mem_lname" value="<?php if (isset($row->mem_lname)) echo $row->mem_lname; ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label class="control-label">Email <span class="symbol required" style="color: red">*</span></label>
                            <input type="text" name="mem_email" 
                            <?php if (isset($row->mem_email)) { echo 'readonly';} ?>  
                            value="<?php if (isset($row->mem_email)) echo $row->mem_email; ?>"  class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">Phone No <span class="symbol required" style="color: red">*</span></label>
                            <input type="text" name="mem_phone" value="<?php if (isset($row->mem_phone)) echo $row->mem_phone; ?>"  class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">Customer Country</label>
                            <select name="mem_language" id="mem_language" class="form-control">
                                <option value="0" selected="" readonly="">-- Select --</option>
                                <?php foreach (['english', 'urdu', 'spanish', 'french'] as $language) : ?>
                                    <option value="<?= $language ?>" <?= $row->mem_language == $language ? 'selected' : '' ?>><?= ucfirst($language) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <h3><i class="fa fa-bars"></i> Equal Opportunities</h3>
                <hr class="hr-short">
                <div class="row">
                    <div class="form-group">
                    <div class="col-md-3">
                            <label class="control-label">Ethnicity</label>
                            <select name="mem_ethnicity" id="mem_ethnicity" class="form-control">
                                <option value="0" selected="" readonly="">-- Select --</option>
                                <?php foreach (['asian', 'white', 'black'] as $value) : ?>
                                    <option value="<?= $value ?>" <?= $row->mem_ethnicity == $value ? 'selected' : '' ?>><?= ucfirst($value) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Sexual Orientation</label>
                            <select name="mem_sex" id="mem_sex" class="form-control">
                                <option value="0" selected="" readonly="">-- Select --</option>
                                <?php foreach (['male', 'female', 'other'] as $value) : ?>
                                    <option value="<?= $value ?>" <?= $row->mem_sex == $value ? 'selected' : '' ?>><?= ucfirst($value) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Nationality</label>
                            <select name="mem_nationality" id="mem_nationality" class="form-control">
                                <option value="0" selected="" readonly="">-- Select --</option>
                                <?php foreach (['pakistani', 'austrailian', 'american'] as $value) : ?>
                                    <option value="<?= $value ?>" <?= $row->mem_nationality == $value ? 'selected' : '' ?>><?= ucfirst($value) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Have A Disability Or Learning Difficulties?</label>
                            <select name="mem_disablity" id="mem_disablity" class="form-control">
                                <option value="0" selected="" readonly="">-- Select --</option>
                                <?php foreach (['yes', 'no'] as $value) : ?>
                                    <option value="<?= $value ?>" <?= $row->mem_disablity == $value ? 'selected' : '' ?>><?= ucfirst($value) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <h3><i class="fa fa-bars"></i> Education</h3>
                <hr class="hr-short">
                <div class="row">
                    <div class="form-group">
                    <div class="col-md-3">
                            <label class="control-label">Current Status</label>
                            <select name="mem_current_status" id="mem_current_status" class="form-control">
                                <option value="0" selected="" readonly="">-- Select --</option>
                                <?php foreach (['student', 'graduated'] as $value) : ?>
                                    <option value="<?= $value ?>" <?= $row->mem_current_status == $value ? 'selected' : '' ?>><?= ucfirst($value) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">University</label>
                            <select name="mem_university" id="mem_university" class="form-control">
                                <option value="0" selected="" readonly="">-- Select --</option>
                                <?php foreach (['UET', 'LUMBS', 'COMSATS'] as $value) : ?>
                                    <option value="<?= $value ?>" <?= $row->mem_university == $value ? 'selected' : '' ?>><?= ucfirst($value) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Degree Subject</label>
                            <select name="mem_subject" id="mem_subject" class="form-control">
                                <option value="0" selected="" readonly="">-- Select --</option>
                                <?php foreach (['computer science', 'commerce', 'arts'] as $value) : ?>
                                    <option value="<?= $value ?>" <?= $row->mem_subject == $value ? 'selected' : '' ?>><?= ucfirst($value) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label"> Graduation Year <span class="symbol required" style="color: red">*</span></label>
                            <input type="text" name="mem_graduate_year" value="<?php if (isset($row->mem_graduate_year)) echo $row->mem_graduate_year; ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <h3><i class="fa fa-bars"></i> Job Preference</h3>
                <hr class="hr-short">
                <div class="row">
                    <div class="form-group">
                    <div class="col-md-3">
                            <label class="control-label">Opportunity Type</label>
                            <select name="mem_opportunity" id="mem_opportunity" class="form-control">
                                <option value="0" selected="" readonly="">-- Select --</option>
                                <?php foreach (['internship', 'fresh', 'experienced'] as $value) : ?>
                                    <option value="<?= $value ?>" <?= $row->mem_opportunity == $value ? 'selected' : '' ?>><?= ucfirst($value) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Industry/Sector</label>
                            <select name="mem_industry" id="mem_industry" class="form-control">
                                <option value="0" selected="" readonly="">-- Select --</option>
                                <?php foreach (['IT', 'accounting', 'business'] as $value) : ?>
                                    <option value="<?= $value ?>" <?= $row->mem_industry == $value ? 'selected' : '' ?>><?= ucfirst($value) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <hr class="hr-short">
                <div class="form-group text-right">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
            </div>
            </div>
        </form>
        <div class="clearfix"></div>
    </div>
    <?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage Video Interviews')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-users"></i> Manage <strong>Video Interviews</strong></h2>
        </div>
        <!-- <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/videointerviews/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div> -->
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th width="10%">User Name</th>
                <th width="20%">User Email</th>
                <th>Submit For Review</th>
                <th width="8%" class="text-center">Status</th>
                <th width="12%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): $count = 0; ?>
            <?php foreach ($rows as $row): ?>
            <tr class="odd gradeX">
                <td class="text-center"><?= ++$count; ?></td>
                <td><b><?= get_mem_name($row->mem_id) ?></b></td>
                <td><?= fet_mem_email($row->mem_id); ?></td>
                <td><?= $row->submit_for_review == 1 ? 'Yes' : 'No'; ?></td>
                <td class="text-center"><?= get_member_active_status($row->status); ?></td>
                <td class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-primary" role="menu">
                            <!-- <li><a href="<?= site_url(ADMIN); ?>/videointerviews/manage/<?= $row->id; ?>">Manage</a></li> -->
                            <li><a href="<?= site_url(ADMIN); ?>/videointerviews/delete/<?= $row->id; ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php endif; ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
// Prepare the preview for profile picture
    jQuery("#wizard-picture").change(function(){
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            jQuery('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }}
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmqmsf3pVEVUoGAmwerePWzjUClvYUtwM&libraries=geometry,places&ext=.js"></script>
    <script>
        
        var map, startLat = "", startLng = "";

        const getLocationAndInitMap = myThis => 
        {
            console.log('run');
            var value= myThis.value;
            value = value.trim();
            var myType = myThis.getAttribute('data-type');
            if(value.length == 0){
                if( myType == 'hotel'){
                    document.getElementById('mem_hotel_map_lat').value = '';
                    document.getElementById('mem_hotel_map_lng').value = '';
                }else if( myType == 'office'){
                    document.getElementById('mem_business_map_lat').value = '';
                    document.getElementById('mem_business_map_lng').value = '';
                }else if( myType == 'home'){
                    document.getElementById('mem_map_lat').value = '';
                    document.getElementById('mem_map_lng').value = '';
                } 
                return false;
            }
            
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode(
            { 
            componentRestrictions: { 
                country: 'gb', 
                postalCode: value
            } 
            }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    latitude = results[0].geometry.location.lat();
                    longitude = results[0].geometry.location.lng();
                    if( myType == 'hotel'){
                        document.getElementById('mem_hotel_map_lat').value = latitude;
                        document.getElementById('mem_hotel_map_lng').value = longitude;
                    }else if( myType == 'office'){
                        document.getElementById('mem_business_map_lat').value = latitude;
                        document.getElementById('mem_business_map_lng').value = longitude;
                    }else if( myType == 'home'){
                        document.getElementById('mem_map_lat').value = latitude;
                        document.getElementById('mem_map_lng').value = longitude;
                    }    
                    
                    
                } else {
                    if( myType == 'hotel'){
                        document.getElementById('mem_hotel_map_lat').value = '';
                        document.getElementById('mem_hotel_map_lng').value = '';
                    }else if( myType == 'office'){
                        document.getElementById('mem_business_map_lat').value = '';
                        document.getElementById('mem_business_map_lng').value = '';
                    }else if( myType == 'home'){
                        document.getElementById('mem_map_lat').value = '';
                        document.getElementById('mem_map_lng').value = '';
                    } 
                }
            });
        }
        </script>