#!/bin/bash

rm -rf OCP
git clone --depth 1 --branch v15.0.0beta2 https://github.com/nextcloud/server.git
cp -r server/lib/public OCP
rm -rf server
