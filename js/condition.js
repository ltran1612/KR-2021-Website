const paperNumberSection = document.getElementById("paper_number_section");
const paperNumberAsterisk = document.getElementById("paper_number_asterisk");
const paperNumber = document.getElementsByName("paper_number")[0];

const displayOption = paperNumberSection.style.display;

paperNumber.required = false;
paperNumberAsterisk.classList.remove("hide");
paperNumberSection.style.display = "none";


const registerPaper = document.getElementsByName("register_paper");
for (let i = 0; i < registerPaper.length; ++i) {
    let value = registerPaper[i].value;
    if (value == "yes") {
        console.log("yes");
        registerPaper[i].onclick = () => {
            paperNumberSection.style.display = displayOption;
            paperNumber.required = true;
        };
    } else if (value == "no") {
        console.log("no");
        registerPaper[i].onclick = () => {
            paperNumber.required = false;
            paperNumberSection.style.display = "none";
        };
    } else {
        console.log("Something is wrong");
    }

} // end for i
