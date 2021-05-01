@extends('layouts.care')
@section('title')
A propos
@stop

<style type="text/css">
@import url("https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800,900");
    h2{
        font-family: "Muli", sans-serif;
    }
</style>
@section('content')
<section class="container bg-gray">
<div class="container mt-5 mb-4">
    <div class="row">
        <div class="col-lg-4">
            <h2 class="text-center">Notre vision <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAABrklEQVRoQ+3XSU7EMBAF0N8XgQPADTgWGwYhIcR0DXasEZwHgcQRWNOylEhRqztdVamyv+nK2kM9f8dOVjiwZ3VgXiT4vyeeCZMlfDXU8+hVF3PCBfswQK8BuKBZwVPsGK4LmhG8DeuGZgPPYV3QTOCyZe+Fh5N5ezOBjwG8AziNRDOBizMczQbWoMs1Vba26mkJPgfwCuBnS8X7kjZhyzytwE8ALgB8AThTos3YVuAROwY7hz4C8DE5yBZhW4A3sRr0m+Wd3Xxdam7pXVgp+lt1Ou1oXAu8DytBe3irHFpSbBV0dMJ3AG4M0ZSD7ATAr6HvbJdIsDbZaaGXAJ69sZGnNCU2CkyLjQBTY73B9FhPcBdYL3A3WA9wV9il4O6wS8BdYq3gbrEWcNdYLbh7rBb8Z/yYD/sRsNSj+VuygKmw0QnTYSPBlNgoMC02AkyN9QbTY7Xg25lr4BPAi+WaqN1Hcy3Vri1kvgSHLCvRoJkwURghpWTCIctKNKgmYcvfUk2qyCJqNFSd4JrxCeYShSdqlAkLlrtBE1F4okYNig+bMsFhS0sycCZMEkRYGWtN8mA9JMXTNwAAAABJRU5ErkJggg=="/></h2>
            <p>
                Être l’interface privilégiée entre clients et prestataires pour tous les besoins des ménages partout en Côte d’Ivoire.
            </p>
        </div>
        <div class="col-lg-4">
           <h2 class="text-center">Notre mission <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAADWklEQVRoQ+2a4Y3UMBBGv6uA6wCogOsAqACoAKjgoAKgAqACoAKOCoAOoIKDDqAC0BOxZGXteDyxnV12R8qP1Sb2PH8z9tjJmY7Mzo6MVyfg/13xk8KNFb4l6a6ki+niN1dsPyRxfZuur9Pvxq78a66HwgA9kPQsAWeFYADeSPrUGr4lMKAvJD2xUhnvey/pVSvwFsDnkl53AJ2PB+DPJf0yDlTytrXADyW9kwT0CAP2qaQrb2drgFGVPN3CyG/UrjYPMGp+lHSvure2D6AyaleFeC0wsJ+nJaat+77WWMru10DXAqMsebtPhtKPrA7VAJM3l9aGB9/31jqfWIFRFXX32VC5OHtbgMnb64FLj3dQmbxul/LZAsyC/9jrxeDnPpQKoBIw5SLqHpKhMrV40krAh6RuAFxUeQl4a3V/SrrpDK2sykvAlI2Uj1tYqJe/SLrjcICyk2V0x5aAyd35Zt3Rd/UjwJJKGCuEB5ocRmUz8FbhHMMGZ73QybDOKcwmnm3fSEvBhv496ZVsLwc8uoxcgvUOfrLczAGTNxy+jbAesPjNYeDOFjYHPGrC6gULcHLiygH/cUj7fZpdrUtZT9jg/g5fK2BgCR8KeEvOjYAFugtwDBtGdgl6FGwXYMo/3iqkzpVS0CNhq4BJeGsda4Ww3ueYPpKPIMZOpdhqWSrB4FEoF+feWXLeMwhVy5Kn8FiCzjncC5b+qgoPryM10N4+rGpXlZZrNg8W6N6wDErV5iFUKtaJaz7qpZzuvTFJTljJaTvy3LNDicFT0COUxQfXAcCasA7gMfQo2Gw4lxQOS8naI1qgsd5hHAbZfYhHAy1Uts6qre5bdUzbSuVWMKV2Vh/E0wFnSpSaN0q9bfz/7ykiF98Xlw7iA8NRvUwL0J5yc5TozV+XBsd5Hck3WPtkfMtlfklvDekA6D0j7jVAqcOHxb5qgcMkxlZva6VRlmKm60ct8ehtmdPmnJ3L7VE4boPcQe1RSxZLD6oWP23IxfVa4BDiqL22BC3lOUUFG5qqEG6tcNweZejLDuCA0m72rX5ppOL/Wyg87w9wQh01vPtp9rNEDaHbBDQ42QN4rjoH9PEH4vNBAC7+QJz3Wk0heytcE2HD7+2t8HCgUocn4NIIHfr/R6fwX2Torj0Yh4zRAAAAAElFTkSuQmCC"/></h2>
            <p>
               Apporter des solutions aux besoins des ménages en mettant en relation des clients en quête de prestations rapides et de qualité avec des prestataires à même de les satisfaire.
            </p>
        </div>
         <div class="col-lg-4">
            <h2 class="text-center">Nos valeurs <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAADoElEQVRoQ+2a8bVMMRCH51VAB6gAFaACVIAKUAEqQAWoABWgAlSAClAB5zuSc+7JJjczk8ndfXZzzv7x3uYm8+U3SWbm7pkcWTs7Ml45Af/vip8UDlb4sojcEJFr6cPffJbtu4jw+ZI+n9Lfwab8G26GwgDdFpFHFTgtBAvwQkTeR8NHAgP6RETua6mU/V6LyLMo8AjgiyLyfAJouR6APxaRX8qFqnYbBb4jIq9EBOgtGrAPROSdd7IRYFRln+6jsb9R29w8wKj5VkRummeLfQCVUdvk4lZgYD+kKybWfN9oXGW3LNBWYJRl3x5SQ+m7WoMswOybh9qBN+73UnueaIFRFXUPuaFy9/TWALNvv2149XgXlcPrSm8/a4C58O95rdj4uTe9AKgHTLiIuuepoTKxeLX1gM+TuhlwVeU14BF1SfFYrI9ptXN6SGR2tVj63Denh8xLUEMSQmrpaU2V14AxjvDR0n4nQ9dOy+W4hIdcd63G7cDCXbAYkcLO6rhrwOzdMlnvzXs9JfG9fjmFBKbX8I7PvU7F9+xhVN5pLWCPO5OzPjUapu3OuOTallZ16xYwCpD2aRuuzCKZAnnt4CkGQDWLa5NY7HhQC9gaRlKKmR1jcy5QOtK2arjZAuZ0tZyQM905A1rdmtN/J4VtAVsPrEMErh5cLeA/Wr9J/Q7RpTFthy8KWBW4Gxdx2Z0E5qfj+WnA2DLTra37N6/NVGAmodzCgRfZOHgoK3maGpgNf8kxA64NNHFxRCPKAtZTBv5RixSjrqUlXBT0CCz2mK4la+BRqjkKPQqLPabAwxpa1tzXCx0Biz2m0NKTPERAR8Fiiyl54AHvweV170jY6oFVjUQW1noKAK2TuefekbDY0CwszCrxWNw7Grbpzj2F+T66iFcqPQPWXcQDOOrwqt3T/M8bVKwFNUNl2hkqM2aujHgiqDXY4UI8g2OUtbwSEVZax1CVmXqF+DzpUb1My9Cj4aZVMUv/8NeleXJrIc1itLevqdqidelsDPuZfLd8XeI1dvS5r6lQpy4PW4HzIcb9bCmZjoLVnkdZkhw1rCbwWDN0n3tavWdLAI/CyzG8L7u8imte1q2OPQqcXRy1Z/9KgKCChMbkwtEKL8cjDKW6GA0OKOM23+pb3CVC4XI+wHF11PAUAhmPfBav4RoMAc1GzgAuVafMuvyBeLkIwC1/IJ5/NWARTt13NrDakK06noC3Wul9zXNSeF8rv9W8fwG7A7o9tvvlcQAAAABJRU5ErkJggg=="/></h2>
            <p>
              <strong> Simplicité </strong>: Nous répondons à vos besoins de la plus simple et qualitative des manières possibles.
              <strong>Transparence</strong>  : Nous sélectionnons pour vous la meilleure prestation au meilleur prix disponible du marché. <br>
             <strong> Proximité</strong> : Nous minimisons votre temps d’attente en étant toujours plus proche de vous.<br><strong>Innovation</strong> : Nos offres s’inscrivent dans l’ère du temps.
            </p>
        </div>
    </div>
</div>

</section>


@stop