document.addEventListener('DOMContentLoaded', function() {
    // Gestion de l'envoi des réponses
    const responseForm = document.getElementById('responseForm');
    
    if (responseForm) {
        responseForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const messageId = this.dataset.messageId;
            const textarea = document.getElementById('responseText');
            const response = textarea.value.trim();
            const statusDiv = document.getElementById('responseStatus');
            
            if (!response) {
                statusDiv.innerHTML = '<div class="alert alert-danger">Veuillez écrire une réponse</div>';
                return;
            }
            
            // Envoi AJAX
            const formData = new FormData();
            formData.append('messageId', messageId);
            formData.append('response', response);
            
            fetch('process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    statusDiv.innerHTML = '<div class="alert alert-success">Réponse envoyée avec succès! Redirection...</div>';
                    
                    // Mettre à jour le badge si nécessaire
                    updateBadgeCount(data.unansweredCount);
                    
                    // Recharger la page après 1.5 seconde pour voir la réponse
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    statusDiv.innerHTML = `<div class="alert alert-danger">Erreur: ${data.error || 'Erreur inconnue'}</div>`;
                    updateBadgeCount(data.unansweredCount);
                }
            })
            .catch(error => {
                statusDiv.innerHTML = '<div class="alert alert-danger">Erreur réseau</div>';
                console.error('Error:', error);
            });
        });
    }
});

// Mettre à jour le compteur de badge
function updateBadgeCount(count) {
    const badges = document.querySelectorAll('.badge');
    badges.forEach(badge => {
        if (count > 0) {
            badge.textContent = count;
            badge.classList.remove('d-none');
        } else {
            badge.classList.add('d-none');
        }
    });
}