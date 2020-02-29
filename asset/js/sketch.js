// Analyse image script

// Initialize the Image Classifier method with MobileNet
function runAnalyser() {
    // document.addEventListener('DOMContentLoaded', function(event) {
    //     spinner.classList.add("uk-spinner")
    //   })
    ml5.imageClassifier('MobileNet')
    .then(classifier => classifier.classify(image))
    .then(results => {
        // spinner.classList.remove("uk-spinner")
        result.innerText = results[0].label;
        probability.innerText = results[0].confidence.toFixed(4);
        probs.style.display = "block";

        if (results[0].confidence.toFixed(4) < 0.5) {
            result.style.color = "#da924e";
        } if (results[0].confidence.toFixed(4) < 0.1) {
            result.style.color = "#ea526f";
        }
    });
}



