<x-public.main>
    {{-- <div id="image-popup" class="image-popup">
        <div class="image-popup-content">
            <span class="image-popup-close-btn">&times;</span>
            <a href="https://perizinan.esdm.go.id/minerba/" target="_blank">
                <img src="/images/image-popup.jpg" alt="Iklan Promosi">
            </a>
        </div>
    </div> --}}

    <div class="scroll-animate">
        <x-public.components.hero />
    </div>
    <div class="scroll-animate scroll-delay-1">
        <x-public.components.lightinformasi />
    </div>
    <div class="scroll-animate scroll-delay-2">
        <x-public.components.banner-minerbaone />
    </div>
    <div class="scroll-animate scroll-delay-1">
        <x-public.components.layanan-esdm />
    </div>
    <div class="scroll-animate scroll-delay-2">
        <x-public.components.info-publik />
    </div>
    <div class="scroll-animate scroll-delay-1">
        <x-public.components.esdm-highlight />
    </div>
    <div class="scroll-animate scroll-delay-2">
        <x-public.components.berita-pers :news="$news" :pers="$pers" activeTab="berita" />
    </div>
    {{-- <x-public.components.berita :news="$news" />
    <x-public.components.siaran-pers :pers="$pers" /> --}}
    <div class="scroll-animate scroll-delay-1">
        <x-public.components.kegiatan />
    </div>
    <div class="scroll-animate scroll-delay-2">
        <x-public.components.sosial-media />
    </div>
    {{-- <x-public.components.publikasi />
    <x-public.components.eselon1 /> --}}

    @push('css')
        <style>
            /* Animasi Scroll */
            .scroll-animate {
                opacity: 0;
                transform: translateY(50px);
                transition: all 0.6s ease-out;
            }

            .scroll-animate.visible {
                opacity: 1;
                transform: translateY(0);
            }

            /* Section timing delays */
            .scroll-delay-1 {
                transition-delay: 0.2s;
            }

            .scroll-delay-2 {
                transition-delay: 0.4s;
            }

            .scroll-delay-3 {
                transition-delay: 0.6s;
            }

            .image-popup {
                display: none;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.8);
                backdrop-filter: blur(5px);
                -webkit-backdrop-filter: blur(5px);
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .image-popup-content {
                position: relative;
                background-color: transparent;
                margin: auto;
                padding: 0;
                border: none;
                width: 90%;
                max-width: 75%;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
                animation-name: animatetop;
                animation-duration: 0.4s;
            }

            .image-popup-content img {
                width: 100%;
                height: auto;
                display: block;
                cursor: pointer;
            }

            .image-popup-close-btn {
                color: #fff;
                position: absolute;
                top: 15px;
                right: 25px;
                font-size: 30px;
                font-weight: bold;
                transition: 0.3s;
                cursor: pointer;
                z-index: 1001;
            }

            .image-popup-close-btn:hover,
            .image-popup-close-btn:focus {
                color: #bbb;
                text-decoration: none;
                cursor: pointer;
            }

            @keyframes animatetop {
                from {
                    top: -300px;
                    opacity: 0
                }

                to {
                    top: 0;
                    opacity: 1
                }
            }

            @media screen and (max-width: 768px) {
                .image-popup-content {
                    width: 90%;
                    margin: 10px;
                }
            }
        </style>
    @endpush

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Popup handling
                const popup = document.getElementById('image-popup');
                const closeBtn = document.querySelector('.image-popup-close-btn');

                // Scroll animation
                const observerOptions = {
                    root: null,
                    rootMargin: '0px',
                    threshold: 0.1
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                            // Optional: stop observing after animation
                            // observer.unobserve(entry.target);
                        }
                    });
                }, observerOptions);

                document.querySelectorAll('.scroll-animate').forEach((element) => {
                    observer.observe(element);
                });

                function closePopup() {
                    if (popup) {
                        popup.style.display = 'none';
                    }
                    const tomorrow = new Date();
                    tomorrow.setDate(tomorrow.getDate() + 1);
                    tomorrow.setHours(0, 0, 0, 0);
                    document.cookie = `imagePopupClosed=true; expires=${tomorrow.toUTCString()}; path=/`;
                }

                const popupClosed = document.cookie.split(';').some((item) => item.trim().startsWith(
                    'imagePopupClosed='));

                if (!popupClosed) {
                    if (popup) {
                        popup.style.display = 'flex';
                    }
                }

                if (closeBtn) {
                    closeBtn.addEventListener('click', closePopup);
                }

                if (popup) {
                    window.addEventListener('click', function(event) {
                        if (event.target === popup) {
                            closePopup();
                        }
                    });
                }

                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Escape') {
                        closePopup();
                    }
                });
            });
        </script>
    @endpush
</x-public.main>
