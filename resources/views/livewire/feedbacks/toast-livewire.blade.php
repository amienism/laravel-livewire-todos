<style>
    .toast-container {
        position: fixed;
        top: 2rem;
        right: 1rem;
        z-index: 1000;
    }

    .toast-body {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: nowrap;
    }

    .fade-in {
        opacity: 1;
        animation-name: fadeInOpacity;
        animation-iteration-count: 1;
        animation-timing-function: ease-in;
        animation-duration: 200ms;
    }

    @keyframes fadeInOpacity {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }
</style>

<div class="toast-container">
    <div class="toast show fade-in" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false"
        data-bs-toggle="toast">
        <div class="toast-body">
            <span>{{ $message }}</span>
            <button type="button" class="ms-2 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
