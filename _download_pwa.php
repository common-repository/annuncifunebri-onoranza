<div id="annfu_download_pwa_wrapper">
    <div>
        <div id="annfu_ios_istruzioni" class="annfu_none">
            <?php echo get_option('annfu_invito_download_pwa_ios', 'Installa la nostra cliccando sul pulsante "condividi" e poi su "aggiungi alla schermata home"') ?>
        </div>
        <button id="annfu_install" hidden>
            <?php echo get_option('annfu_invito_download_pwa_android', 'Scarica la nostra app') ?>
        </button>
    </div>
    <a href="#" id="annfu_close_pwa" class="annfu_pointer"><small>Chiudi</small></a>
</div>
<script type="text/javascript">
    let installPrompt = null;
    const installButton = document.querySelector("#annfu_install");

    window.addEventListener("beforeinstallprompt", (event) => {
        event.preventDefault();
        installPrompt = event;
        installButton.removeAttribute("hidden");
    });

    installButton.addEventListener("click", async () => {
        if (!installPrompt) {
            return;
        }
        const result = await installPrompt.prompt();
        disableInAppInstallPrompt();
    });

    function disableInAppInstallPrompt() {
        installPrompt = null;
        installButton.setAttribute("hidden", "");
    }

    window.addEventListener("appinstalled", () => {
        disableInAppInstallPrompt();
    });

    function disableInAppInstallPrompt() {
        installPrompt = null;
        installButton.setAttribute("hidden", "");
    }

    function showIosInstallInstructions() {
        const userAgent = window.navigator.userAgent.toLowerCase();
        const isIos = /iphone|ipad|ipod/.test(userAgent);
        const isInStandaloneMode = window.matchMedia('(display-mode: standalone)').matches;

        if (isIos && !isInStandaloneMode) {
            document.querySelector("#annfu_ios_istruzioni").classList.remove('annfu_none');
        }
    }

    showIosInstallInstructions();

    jQuery(document).ready(function () {
        if (Cookies.get('annfu_download_pwa') == 1) {
            jQuery('#annfu_download_pwa_wrapper').hide();
        }

        jQuery('#annfu_close_pwa').on('click', function () {
            jQuery('#annfu_download_pwa_wrapper').hide();
            Cookies.set('annfu_download_pwa', 1, {expires: 7});
        })
    });
</script>