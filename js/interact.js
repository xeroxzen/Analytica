var icons = document.getElementsByClassName('fa');

for (var i = 0; i <= icons.length; i++) {
    console.log(icons[i]);
}

var el = document.querySelector('header h3');

for (var i = 0; i <= el.length; i++) {
    console.log(el[i]);
}

var myself = {
    name: "Andile Jaden Mbele",
    age: 21,
    profession: "Programmer",
    goal: "To provide a non partisan news platform for all",
}

var person = new Object();
person.name = 'Andile';
person.lastName = 'Mbele';

console.log("NewsNet was built by " + person.name);


//This is the form validation for the comment box;

function formValidation() {
    var name = document.forms["comment_form"]["name"].value;

    if (name == null || name == "") {
        alert("Name cannot be empty.");
        return false
    }
    if (name.length < 2) {
        alert("Username too short");
        return false
    }

    var email = document.forms["comment_form"]["email"].value;

    if (email == null || email == "") {
        alert("Email address is required.");
        return false;
    }
    var comment = document.forms["comment_form"]["comment_body"].value;

    if (comment == null || comment == "") {
        alert("Comment section cannot be empty");
        return false;
    }
    if (comment.length < 5) {
        alert("Comment too short. Try again.");
        return false;
    }

}

//	function getLinks(){
//		var ext_link = html.getElementById('ext_link');
//		ext_link.onmouseclick.open('New Tab');
//	}