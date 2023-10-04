@extends('layouts.frontend')
@section('content')

<div class="block-content" style="margin-top: 150px;">
<div class="col-md-12">
    <!-- Form Validation Example Block -->

        <!-- END Form Validation Example Title -->

        <!-- Form Validation Example Content -->
        <div class="block">
            <!-- Clickable Wizard Title -->
            <div class="block-title">
                <h2><strong>Clickable</strong> Wizard</h2>
            </div>
            <!-- END Clickable Wizard Title -->

            <!-- Clickable Wizard Content -->
            <form id="clickable-wizard" action="page_forms_wizard.html" method="post" class="form-horizontal form-bordered">
                <!-- First Step -->
                <div id="clickable-first" class="step">
                    <!-- Step Info -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <ul class="nav nav-pills nav-justified clickable-steps">
                                <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-first"><strong>1. Account</strong></a></li>
                                <li ><a href="javascript:void(0)" data-gotostep="clickable-second"><strong>2. Personal</strong></a></li>
                                <li ><a href="javascript:void(0)" data-gotostep="clickable-third"><strong>3. Extras</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Step Info -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-clickable-username">Username</label>
                        <div class="col-md-5">
                            <input type="text" id="example-clickable-username" name="example-clickable-username" class="form-control" placeholder="Your username..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-clickable-email">Email</label>
                        <div class="col-md-5">
                            <input type="text" id="example-clickable-email" name="example-clickable-email" class="form-control" placeholder="test@example.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-clickable-password">Password</label>
                        <div class="col-md-5">
                            <input type="password" id="example-clickable-password" name="example-clickable-password" class="form-control" placeholder="Choose a crazy one..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-clickable-password2">Confirm Password</label>
                        <div class="col-md-5">
                            <input type="password" id="example-clickable-password2" name="example-clickable-password2" class="form-control" placeholder="..and confirm it!">
                        </div>
                    </div>
                </div>
                <!-- END First Step -->

                <!-- Second Step -->
                <div id="clickable-second" class="step">
                    <!-- Step Info -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <ul class="nav nav-pills nav-justified clickable-steps">
                                <li><a href="javascript:void(0)" data-gotostep="clickable-first"><i class="fa fa-check"></i> <strong>1. Account</strong></a></li>
                                <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-second"><strong>2. Personal</strong></a></li>
                                <li><a href="javascript:void(0)" data-gotostep="clickable-third"><strong>3. Extras</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Step Info -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-clickable-firstname">Firstname</label>
                        <div class="col-md-5">
                            <input type="text" id="example-clickable-firstname" name="example-clickable-firstname" class="form-control" placeholder="John..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-clickable-lastname">Lastname</label>
                        <div class="col-md-5">
                            <input type="text" id="example-clickable-lastname" name="example-clickable-lastname" class="form-control" placeholder="Doe..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-clickable-country">Country</label>
                        <div class="col-md-5">
                            <input type="text" id="example-clickable-country" name="example-clickable-country" class="form-control" placeholder="Where do you live?">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-clickable-city">City</label>
                        <div class="col-md-5">
                            <input type="text" id="example-clickable-city" name="example-clickable-city" class="form-control" placeholder="Which one?">
                        </div>
                    </div>
                </div>
                <!-- END Second Step -->

                <!-- Third Step -->
                <div id="clickable-third" class="step">
                    <!-- Step Info -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <ul class="nav nav-pills nav-justified clickable-steps">
                                <li><a href="javascript:void(0)" data-gotostep="clickable-first"><i class="fa fa-check"></i> <strong>1. Account</strong></a></li>
                                <li><a href="javascript:void(0)" data-gotostep="clickable-second"><i class="fa fa-check"></i> <strong>2. Personal</strong></a></li>
                                <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-third"><strong>3. Extras</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Step Info -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-clickable-bio">Bio</label>
                        <div class="col-md-8">
                            <textarea id="example-clickable-bio" name="example-clickable-bio" rows="6" class="form-control" placeholder="Tell us your story.."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-clickable-newsletter">Newsletter</label>
                        <div class="col-md-8">
                            <div class="checkbox">
                                <label for="example-clickable-newsletter">
                                    <input type="checkbox" id="example-clickable-newsletter" name="example-clickable-newsletter">  Sign up
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><a href="#modal-terms" data-toggle="modal">Terms</a></label>
                        <div class="col-md-8">
                            <label class="switch switch-primary" for="example-clickable-terms">
                                <input type="checkbox" id="example-clickable-terms" name="example-clickable-terms" value="1">
                                <span data-toggle="tooltip" title="I agree to the terms!"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- END Third Step -->

                <!-- Form Buttons -->
                <div class="form-group form-actions">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="reset" class="btn btn-sm btn-warning" id="back4">Previous</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="next4">Next</button>
                    </div>
                </div>
                <!-- END Form Buttons -->
            </form>
            <!-- END Clickable Wizard Content -->
        </div>
        <!-- END Form Validation Example Content -->

        <!-- Terms Modal -->
        <div id="choix_type_personne" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title"><i class="gi gi-pen"></i> Service Terms</h3>
                    </div>
                    <div class="modal-body">
                        <h4 class="sub-header">1.1 | General</h4>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <h4 class="sub-header">1.2 | Account</h4>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <h4 class="sub-header">1.3 | Service</h4>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <h4 class="sub-header">1.4 | Payments</h4>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Ok, I've read them!</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Terms Modal -->
    </div>
    <!-- END Validation Block -->
</div>


@endsection
