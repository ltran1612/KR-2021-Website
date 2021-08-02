// get the components
const paperNumberSection = document.getElementById("paper_number_section");
const registerPaper = document.getElementsByName("register_paper");
const inputs = paperNumberSection.getElementsByClassName("required-input");

// this will only be run if javascript is enabled; 
// that is, if the browser doesn't have javascript enabled, the asterisk will not be displayed, but the field will still be required.


// initialization
todoNo(inputs, paperNumberSection);
// initialize the display
for (let i = 0; i < registerPaper.length; ++i) {
    let radioButt = registerPaper[i];
    let value = radioButt.value;

    // initialization
    if (radioButt.checked) {
        if (value == "yes") {
            //console.log("checked yes");
            todoYes(inputs, paperNumberSection);
        } else if (value == "no") {
            //console.log("no");
            todoNo(inputs, paperNumberSection);
        } else {
            console.log("Something is wrong");
        } // end else
    }  // end if

    if (value == "yes") {
        radioButt.onclick = () => {
            todoYes(inputs, paperNumberSection);
        }; // end onclick
    } else if (value == "no") {
        radioButt.onclick = () => {
            todoNo(inputs, paperNumberSection);
        }; // end onclick
    } else {
        console.log("Something is wrong");
    } // end else
} // end for i

function todoYes(inputs, paperNumberSection) {
    for (let i = 0; i < inputs.length; ++i) {
        inputs[i].required = true;
    } // end for
    paperNumberSection.classList.remove("hide");
} // end todoYes

function todoNo(inputs, paperNumberSection) {
    for (let i = 0; i < inputs.length; ++i) {
        inputs[i].required = false;
    } // end for
    paperNumberSection.classList.add("hide");
} // end todoNo