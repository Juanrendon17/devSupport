pipeline {
    agent any
    
    tools {
        dockerTool 'docker-latest'
    }
    
    stages {
        stage('Build') {
            steps {
                echo 'Building the Docker images...'
                sh 'docker-compose build'
            }
        }
        stage('Start Services') {
            steps {
                echo 'Starting the application services...'
                sh 'docker-compose up -d'
            }
        }
        stage('Test API') {
            steps {
                echo 'Pausing for 10 seconds to let services initialize...'
                sleep 10 
                echo 'Testing the get_tickets endpoint...'
                sh 'curl -f http://localhost:8080/get_tickets.php'
            }
        }
    }
    
    post {
        always {
            script {
                echo 'Pipeline finished. Tearing down the services...'
                sh 'docker-compose down || true'
            }
        }
    }
}
