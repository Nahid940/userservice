pipeline {
    agent any

    stages {
        stage('Checkout Code') {
            steps {
                // Pull code from GitHub
                git branch: 'main', url: 'https://github.com/Nahid940/userservice.git'
            }
        }
        
        stage('Install Dependencies') {
            steps {
                // Ensure dependencies are installed
                sh 'composer install --no-dev --optimize-autoloader'
            }
        }
        
        stage('Run Migrations') {
            steps {
                // Run Laravel migrations
                sh 'php artisan migrate --force'
            }
        }

        stage('Clear Cache and Config') {
            steps {
                // Clear and cache config
                sh 'php artisan config:clear'
                sh 'php artisan config:cache'
                sh 'php artisan route:clear'
                sh 'php artisan route:cache'
            }
        }
    }

    post {
        success {
            echo 'Deployment successful!'
        }
        failure {
            echo 'Deployment failed. Check the logs for more details.'
        }
    }
}