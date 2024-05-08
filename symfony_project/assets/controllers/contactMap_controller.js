//import { Controller } from '@hotwired/stimulus';
//import { Loader } from "@googlemaps/js-api-loader";
//import { APS_API_KEY } from "/env";
//
//export default class extends Controller {
//    connect(){
//        this.createMap();
//    }
//
//    createMap() {
//        const cairo = { lat: 49.74361351611922, lng: 13.595000399387061 };
//
//        const loader = new Loader({
//            apiKey: APS_API_KEY,
//            version: "weekly",
//        });
//
//        loader.load().then(async () => {
//            async function initMap() {
//                const { Map, InfoWindow  } = await google.maps.importLibrary("maps");
//                const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
//                const map = new Map(document.getElementById("map"), {
//                    center: cairo,
//                    zoom: 15,
//                    mapId: 'e2be5ba57b60b741',
//                    gestureHandling: "cooperative",
//                    mapTypeControl: false,
//                });
//
//                const marker = new AdvancedMarkerElement({
//                    map,
//                    position: cairo,
//                    title: "Místo atelieru",
//                });
//                const contentString =`
//                    <div>
//                        <h2>Fotospektrum</h2>
//                        <p>Smetanova 49<br> 337 01 Rokycany 1 <br> Česko</p>
//                        <div class="navigate">
//                            <div>
//                                <a aria-label="Vyhledejte v Mapách Google trasu k tomuto místu." target="_blank"
//                                   href="https://www.google.cz/maps/place/Fotospektrum/@49.7439831,13.5926545,17.5z/data=!4m6!3m5!1s0x470afc834aea7159:0x81f33408d1bfa159!8m2!3d49.7436111!4d13.595!16s%2Fg%2F1v41z4y7?entry=ttu">
//                                    <div class="navigate-text">Zobrazit v Mapách Google</div>
//                                </a>
//                            </div>
//                        </div>
//                    </div>`;
//
//                const infoWindow = new InfoWindow();
//                marker.addListener("click", () => {
//                    infoWindow.setContent(contentString);
//                    infoWindow.open(marker.map, marker);
//                });
//            }
//            initMap();
//        });
//
//    }
//}
//