// get the components
const paperNumberSection = document.getElementById("paper_number_section");
const paperNumberAsterisk = document.getElementById("paper_number_asterisk");
const paperNumber = document.getElementsByName("paper_number")[0];
const registerPaper = document.getElementsByName("register_paper");

// old display option
const displayOption = paperNumberSection.style.display;
// this will only be run if javascript is enabled; 
// that is, if the browser doesn't have javascript enabled, the asterisk will not be displayed, but the field will still be required.
paperNumberAsterisk.classList.remove("hide");

// initialize the display
paperNumber.required = false;
paperNumberSection.style.display = "none";
let date = new Date();
for (let i = 0; i < registerPaper.length; ++i) {
    //console.log(date.getHours() + " " + date.getSeconds());
    let input = registerPaper[i];
    let value = input.value;
    if (input.checked) {
        if (value == "yes") {
            console.log("checked yes");
            paperNumberSection.style.display = displayOption;
            paperNumber.required = true;
        } else if (value == "no") {
            console.log("no");
            paperNumber.required = false;
            paperNumberSection.style.display = "none";
        } else {
            console.log("Something is wrong");
        } // end else
    } 
} // end for i



console.log(registerPaper[0].value + " " + registerPaper[0].checked);
console.log(registerPaper[1].value + " " + registerPaper[1].checked);
for (let i = 0; i < registerPaper.length; ++i) {
    let value = registerPaper[i].value;
    if (value == "yes") {
        //console.log("yes");
        registerPaper[i].onclick = () => {
            paperNumberSection.style.display = displayOption;
            paperNumber.required = true;
            console.log(registerPaper[0].value + " " + registerPaper[0].checked);
            console.log(registerPaper[1].value + " " + registerPaper[1].checked);
        };
    } else if (value == "no") {
        //console.log("no");
        registerPaper[i].onclick = () => {
            paperNumber.required = false;
            paperNumberSection.style.display = "none";
            console.log(registerPaper[0].value + " " + registerPaper[0].checked);
            console.log(registerPaper[1].value + " " + registerPaper[1].checked);
        };
    } else {
        console.log("Something is wrong");
    }

} // end for i
