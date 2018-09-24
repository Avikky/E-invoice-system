//init input selecct

var select = document.querySelector('select');
M.FormSelect.init(select, {});


document.addEventListener('DOMContentLoaded', function () {
  var elems = document.querySelectorAll('.modal');
  var instances = M.Modal.init(elems, {
    dismissible: false
  });
});



// LIVE SEARCH CODE


$('form#search').submit(function (e) {
  e.preventDefault();
  var searchInput = $('input#search-input').val();
  var submit = $('button#search-btn').val();
  if ($.trim(searchInput) != '') {
    $.post('search.php', {
        search: searchInput,
        submit: submit
      },
      function (data, status) {
        $('p#data').html(data);
      });
  }
});

var adminHedErr =
  $.get("admin.php?value=Record%20deleted%20successfully", function () {
    setTimeout(function () {
      $('#msgout').remove();
    }, 3000); //5secs
  });

//print fuction for invoice page

function print() {
  window.print()
}

//fuction to add a custom input box
document.querySelector('button#create-newCat').addEventListener('click', function (e) {
  e.preventDefault()
  const get = document.querySelector('div#other-Cat')
  if (get.style.display === 'none') {
    e.target.textContent = 'Click to remove input'
    get.style.display = 'block'
  } else {
    e.target.textContent = 'Create custom category'
    get.style.display = 'none'
  }

})