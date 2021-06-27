function display() {
    if (document.getElementById('fname').value == "" || document.getElementById('lname').value == "" || document.getElementById('email').value == "" || document.getElementById('subject').value == "") {
        alert("Please Fill the below Fields properly!!");
    } else {
        alert("Message Saved ,  Thank you");
    }
}