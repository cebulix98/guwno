<h4><b>{{__('motions.title_motion_type_4')}}</b></h4>
@include('subpages/motions/forms/motion_form_price_inline')

@include('subpages/motions/forms/modules/motion_form_basic')
@include('subpages/motions/forms/modules/motion_form_convict')
@include('subpages/motions/forms/modules/motion_form_convict_address')
@include('subpages/motions/forms/modules/motion_form_penalty')
<h4 class="section-title text-left"><span class=" ml-3 ">{!!__('headlines.penalty_delay')!!}</span></h4>
@include('subpages/motions/forms/modules/motion_form_penalty_delay_illness')