const content_area = document.querySelector('#content-area');

const buttons_file = document.querySelectorAll('.btn-file');

buttons_file.forEach(button_file => {
  button_file.addEventListener('click', (event) => {
    const lesson = event.target.getAttribute('data-file');
    start(lesson);
  });
});

async function start(lesson) {
  let url = document.location.origin;
  let response = await fetch(`${url}/learn/${lesson}`);
  const commits = await response.text();
  content_area.innerHTML = md.render(commits);

  Rainbow.color(() => console.log('Новые блоки с кодом теперь подсвечены!'));
}
