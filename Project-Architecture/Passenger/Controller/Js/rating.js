// const stars = document.querySelectorAll('.star');
// const countSpan = document.getElementById('count');
// const ratingInput = document.getElementById('ratingInput');

// function updateCount() {
//   let count = 0;
//   stars.forEach(star => { if(star.checked) count++; });
//   countSpan.innerText = count;
//   ratingInput.value = count; 
// }

// stars.forEach(star => { star.addEventListener('change', updateCount); });

// rating.js

// Handle multiple star groups
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.stars').forEach(starGroup => {
        const flightId = starGroup.dataset.flight;
        const stars = starGroup.querySelectorAll('.star');
        const countSpan = document.querySelector('.count[data-flight="'+flightId+'"]');
        const ratingInput = document.querySelector('.ratingInput[name="rating_'+flightId+'"]');

        stars.forEach(star => {
            star.addEventListener('change', () => {
                let total = 0;
                stars.forEach(s => { if(s.checked) total++; });
                countSpan.innerText = total;
                if(ratingInput) ratingInput.value = total;
            });
        });
    });
});
