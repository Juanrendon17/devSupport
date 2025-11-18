#!/bin/bash

# Fix docker.sock ownership when container starts
if [ -S /var/run/docker.sock ]; then
    chown root:docker /var/run/docker.sock
    chmod g+w /var/run/docker.sock
fi

# Execute the original Jenkins entrypoint
exec /usr/bin/tini -- /usr/local/bin/jenkins.sh "$@"
