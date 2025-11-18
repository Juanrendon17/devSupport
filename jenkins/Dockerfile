FROM jenkins/jenkins:lts

USER root

# Install Docker CLI and Docker Compose
RUN apt-get update && apt-get install -y \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg \
    lsb-release \
    && curl -fsSL https://download.docker.com/linux/debian/gpg | gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg \
    && echo "deb [arch=amd64 signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/debian bookworm stable" | tee /etc/apt/sources.list.d/docker.list > /dev/null \
    && apt-get update \
    && apt-get install -y docker-ce-cli docker-compose-plugin \
    && rm -rf /var/lib/apt/lists/*

# Create symlink for docker-compose command (backward compatibility)
RUN ln -s /usr/libexec/docker/cli-plugins/docker-compose /usr/local/bin/docker-compose

# Create docker group with matching GID
ARG DOCKER_GID=999
RUN groupadd -g ${DOCKER_GID} -o docker || true && \
    usermod -aG docker jenkins

USER jenkins
RUN jenkins-plugin-cli --plugins docker-workflow

USER root
