function OnClickShowContractor(toggle) {
    if(toggle) {
        $('.is_contractor_company').show();
        $('.input_contractor_company').prop('required', true);
    } else {
        $('.is_contractor_company').hide();
        $('.input_contractor_company').prop('required', false);
    }
} 

