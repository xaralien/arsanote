<script>
        const c = document.querySelector('.containers');
        const indexs = Array.from(document.querySelectorAll('.index'));
        let cur = -1;

        const moveContainer = (i) => {
            // Clear classes
            c.className = 'containers';
            void c.offsetWidth; // Reflow
            c.classList.add('open');
            c.classList.add(`i${i + 1}`);
            if (cur > i) {
                c.classList.add('flip');
            }
            cur = i;
        };

        indexs.forEach((index, i) => {
            index.addEventListener('click', (e) => {
                moveContainer(i);
            });
        });

        // Button click event
        const moveButton = document.getElementById('moveButton');
        moveButton.addEventListener('click', () => {
            // Get the next index to move to (cyclically)
            const nextIndex = (cur + 1) % indexs.length;
            moveContainer(nextIndex);
        });

    </script>