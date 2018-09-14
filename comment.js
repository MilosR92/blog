function commentForm() {
    var author = document.forms['firsForm']['formName'].value;
    var comment = document.forms['firstForm']['comment'].value;

    if (author == '' || comment == '') {
        alert("Both fields are required!");
        return false;
    }
    return true;
}