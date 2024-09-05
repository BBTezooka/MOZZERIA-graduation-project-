const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        const square = entry.target.querySelector('.observe-img');
        if (entry.isIntersecting) {
            square.classList.add('vegy-animation');
            return; // если класс добавлен, продолжать уже не надо
            observer.unobserve.entry.target
        }
        // перемещение завершено, теперь надо удалить класс
        square.classList.remove('vegy-animation');
    });
});
const images = document.querySelectorAll('.observe-holder')
images.forEach(image => {observer.observe(image)})