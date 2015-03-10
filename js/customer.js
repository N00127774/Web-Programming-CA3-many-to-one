window.onload = function() {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createProgrammerForm'
    //-------------------------------------------------------------------------
    var createCustomerForm = document.getElementById('createCustomerForm');
    if (createCustomerForm !== null) {
        createCustomerForm.addEventListener('submit', validateCustomerForm);
    }

    function validateCustomerForm(event) {
        var form = event.target;

        var name = form['name'].value;
        var email = form['email'].value;
        var mobileNumber = form['mobileNumber'].value;
        var address = form['address'].value;
        var dateRegistered = form['dateRegistered'].value;
        var branchID = form['branchID'].value;
        
        var spanElements = document.getElementsByClassName("error");
        for (var i = 0; i !== spanElements.length; i++) {
            spanElements[i].innerHTML = "";
        }

        var errors = new Object();

        if (name === "") {
            errors["name"] = "name cannot be empty\n";
        }
        if (email === "") {
            errors["email"] = "Password cannot be empty\n";
        }
        if (mobileNumber === "") {
            errors["mobileNumber"] = "Mobilenumber cannot be empty\n";
        }

        if (address === "") {
            errors["address"] = "address cannot be empty\n";
        }
        if (dateRegistered === "") {
            errors["dateRegistered"] = "dateregistered cannot be empty";
        }
        
        if (branchID === "") {
            errors["branchID"] = "Branch cannot be empty";
        }


        var valid = true;
        for (var index in errors) {
            valid = false;
            var errorMessage = errors[index];
            var spanElement = document.getElementById(index + "Error");

            spanElement.innerHTML = errorMessage;

        }
        
        if (!valid) {
            event.preventDefault();
        }
        else if (!confirm("Save ?")) {
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#createProgrammerForm'
    //-------------------------------------------------------------------------
    var editCustomerForm = document.getElementById('editCustomerForm');
    if (editCustomerForm !== null) {
        editCustomerForm.addEventListener('submit', validateCustomerForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteProgrammer' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteCustomer');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this customer?")) {
            event.preventDefault();
        }
    }

};