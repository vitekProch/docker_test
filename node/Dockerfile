FROM node:14
WORKDIR /var/www/html
COPY package*.json ./
RUN npm install
CMD ["npm", "run", "watch"]
