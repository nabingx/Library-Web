var username = document.querySelector("#username");
var password = document.querySelector("#password");
var email = document.querySelector("#email");
var address = document.querySelector("#addr");
var tele = document.querySelector("#tele");
var form = document.querySelector("form");

function showError(input) {
  //   console.log(input.parentElement);
  let parent = input.parentElement;
  let small = parent.querySelector("small");
  small.classList.remove("notShow");
  parent.classList.add("error");
}

function showSuccess(input) {
  //   console.log(input.parentElement);
  let parent = input.parentElement;
  let small = parent.querySelector("small");
  small.classList.add("notShow");
  parent.classList.remove("error");
}

// showError(username);
// showSuccess(username);
function checkEmptyError(listInput) {
  let isEmpty = false;
  listInput.forEach((e) => {
    e.value = e.value.trim();
    if (e.value == "") {
      isEmpty = true;
      showError(e);
    } else {
      showSuccess(e);
    }
  });
  return isEmpty;
}

form.addEventListener("submit", function (e) {
  e.preventDefault();
  let isEmpty = checkEmptyError([username, email, password, password, tele, address]);
});