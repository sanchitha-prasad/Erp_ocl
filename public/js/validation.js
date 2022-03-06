function niccheck(nic){
      
    var cnic_no_regex = new RegExp('^[0-9+]{9}[vV|xX]$');
    var new_cnic_no_regex = new RegExp('^[0-9+]{12}$');
    var nicerro = $('.nicerror');
    // var nicerro1 =document.getElementById('nicerroredit');
    
    console.log(nic);
    const submitbtn = document.getElementById('submit');
    const submitbtn1 = document.getElementById('submit1');
    if (nic.length == 10 && cnic_no_regex.test(nic)) {
        nicerro.addClass("green");
        $('.nic').removeClass('error');
        nicerro.text('valid Nic Number');
     
        submitbtn.disabled = false;
        submitbtn1.disabled = false;
    } else if (nic.length == 12 && new_cnic_no_regex.test(nic)) {
        $('.nic').removeClass('error');
        nicerro.addClass("green");
        nicerro.text('valid Nic Number');
        submitbtn.disabled = false;
        submitbtn1.disabled = false;
    } else {
        $('.nic').addClass('error');
        nicerro.text('Invalid Nic Number');
        nicerro.addClass("red");
        nicerro.removeClass("green");
        submitbtn.setAttribute('disabled', true);
        submitbtn1.setAttribute('disabled', true);

    }
        }