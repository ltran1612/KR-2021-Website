/*
    This will only be run if javascript is enabled; 
    that is, if the browser doesn't have javascript enabled, the asterisk will not be displayed, but the field will still be required.

    The purpose of this code is to make sure that things are shown based on conditions. 
*/

// get the components
// paper number section
const paperNumberSection = document.getElementById("paper_number_section");
const registerPaperField = document.getElementsByName("register_paper");
const paperNumberSectionInputs = paperNumberSection.getElementsByClassName("required-input");

// scholarship section
const scholarshipSection = document.getElementById("scholarship_section");
const isStudentField = document.getElementsByName("is_student");
const hasScholarshipField = document.getElementsByName("has_scholarship");
const scholarshipInfoSection = document.getElementById("scholarship_info_section");
const scholarshipInfoSectionInputs = scholarshipInfoSection.getElementsByClassName("required-input");



// paper number section
// initialization
todoNo(paperNumberSectionInputs, paperNumberSection);
// initialize the display
for (let i = 0; i < registerPaperField.length; ++i) {
    let radioButt = registerPaperField[i];
    let value = radioButt.value;

    // initialization
    if (radioButt.checked) {
        if (value == "yes") {
            //console.log("checked yes");
            todoYes(paperNumberSectionInputs, paperNumberSection);
        } else if (value == "no") {
            //console.log("no");
            todoNo(paperNumberSectionInputs, paperNumberSection);
        } else {
            console.log("Something is wrong");
        } // end else
    }  // end if

    if (value == "yes") {
        radioButt.onclick = () => {
            todoYes(paperNumberSectionInputs, paperNumberSection);
        }; // end onclick
    } else if (value == "no") {
        radioButt.onclick = () => {
            todoNo(paperNumberSectionInputs, paperNumberSection);
        }; // end onclick
    } else {
        console.log("Register Paper - Something is wrong");
    } // end else
} // end for i

//------------SCHOLARSHIPS SECTIONS-------------//
// scholarship sections
function unrequiring() {
    for (let i = 0; i < hasScholarshipField.length; ++i) {
        unRequired(hasScholarshipField[i]);
    } // end for i
    todoNo(scholarshipInfoSectionInputs, scholarshipInfoSection);
} // end temp
function requiring() {
    for (let i = 0; i < hasScholarshipField.length; ++i) {
        makeRequired(hasScholarshipField[i]);
    } // end for i
} // end temp
// initialization
hideSection(scholarshipSection);
unrequiring();


// show/hide based on isStudent answer
for (let i = 0; i < isStudentField.length; ++i) {
    let radioButt = isStudentField[i];
    let value = radioButt.value;

    // initialization
    if (radioButt.checked) {
        if (value == "yes") {
            showScholarshipSection();
        } else if (value == "no") {
            //console.log("no");
            hideSection(scholarshipSection);
            unrequiring();
        } else {
            console.log("Something is wrong");
        } // end else
    }  // end if

    if (value == "yes") {
        radioButt.onclick = () => {
            showScholarshipSection();
        }; // end onclick
    } else if (value == "no") {
        radioButt.onclick = () => {
            hideSection(scholarshipSection);
            unrequiring();
        }; // end onclick
    } else {
        console.log("Scholarship: Something is wrong");
    } // end else
} // end for i
// show/hide based on hasScholarship answer
for (let i = 0; i < hasScholarshipField.length; ++i) {
    let radioButt = hasScholarshipField[i];
    let value = radioButt.value;

    // initialization
    if (radioButt.checked) {
        if (value == "yes") {
            todoYes(scholarshipInfoSectionInputs, scholarshipInfoSection);
        } else if (value == "no") {
            //console.log("no");
            todoNo(scholarshipInfoSectionInputs, scholarshipInfoSection);
        } else {
            console.log("Something is wrong");
        } // end else
    }  // end if

    if (value == "yes") {
        radioButt.onclick = () => {
            todoYes(scholarshipInfoSectionInputs, scholarshipInfoSection);
        }; // end onclick
    } else if (value == "no") {
        radioButt.onclick = () => {
            todoNo(scholarshipInfoSectionInputs, scholarshipInfoSection);
        }; // end onclick
    } else {
        console.log("Scholarship Info: Something is wrong");
    } // end else
} // end for i

/**-----FUNCTIONS--------**/

/**
 * Show the scholarship section
 */
function showScholarshipSection() {
    showSection(scholarshipSection);
    requiring();

    for (let i = 0; i < hasScholarshipField.length; ++i) {
        let radioButt = hasScholarshipField[i];
        let value = radioButt.value;
    
        // initialization
        if (radioButt.checked) {
            if (value == "yes") {
                todoYes(scholarshipInfoSectionInputs, scholarshipInfoSection);
            } else if (value == "no") {
                //console.log("no");
                todoNo(scholarshipInfoSectionInputs, scholarshipInfoSection);
            } else {
                console.log("Something is wrong");
            } // end else
        }  // end if
    } // end for i
} // end showSchoalrshipSection

/*
    Make the inputs required

    Show the section
*/
function todoYes(inputs, section) {
    for (let i = 0; i < inputs.length; ++i) {
        makeRequired(inputs[i]);
    } // end for
    showSection(section);
} // end todoYes

/*
    Make the inputs not required
    Hide the section
*/
function todoNo(inputs, section) {
    for (let i = 0; i < inputs.length; ++i) {
        unRequired(inputs[i]);
    } // end for
    hideSection(section);
} // end todoNo

/*
    Hide the section
*/
function hideSection(section) {
    section.classList.add("hide");
} // end hideSection

/*
    Show the section
*/
function showSection(section) {
    section.classList.remove("hide");
} // end hideSection

function makeRequired(input) {
    input.required = true;
} // end makeRequired

function unRequired(input) {
    input.required = false;
} // end makeRequired

