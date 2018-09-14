function hideFun() {
    var a = document.getElementById("singleComment");
    var b = document.getElementById("hideBtn");
    if (a.style.display === "none") {
        a.style.display = "block";
        b.innerHTML = "Hide comments";
    } else {
        a.style.display = "none"
        b.innerHTML = "Show comments";

    }
}
