window.onload = function() {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createProgrammerForm'
    //-------------------------------------------------------------------------
    var createBranchForm = document.getElementById('createBranchForm');
    if (createBranchForm !== null) {
        createBranchForm.addEventListener('submit', validateBranchForm);
    }

    function validateBranchForm(event) {
        var form = event.target;

    
        var address = form['address'].value;
        var number = form['number'].value;
        var openingHours = form['openingHours'].value;
        var managerName = form['managerName '].value;
       
        
        var spanElements = document.getElementsByClassName("error");
        for (var i = 0; i !== spanElements.length; i++) {
            spanElements[i].innerHTML = "";
        }

        var errors = new Object();

    
        if (address === "") {
            errors["address"] = "Password cannot be empty\n";
        }
        if (number === "") {
            errors["number"] = "Mobilenumber cannot be empty\n";
        }

        if (openingHours === "") {
            errors["openingHours"] = "address cannot be empty\n";
        }
        if (managerName === "") {
            errors["managerName"] = "dateregistered cannot be empty";
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
    var editBranchForm = document.getElementById('editBranchForm');
    if (editBranchForm !== null) {
        editBranchForm.addEventListener('submit', validateBranchForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteProgrammer' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteBranch');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this branch?")) {
            event.preventDefault();
        }
    }

};

