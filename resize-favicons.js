import sharp from 'sharp';
import fs from 'fs';
import path from 'path';

const __dirname = path.dirname(new URL(import.meta.url).pathname);
const inputFile = path.resolve(__dirname, 'resources/images/favicon.png');
const outputDir = path.resolve(__dirname, 'public/images/favicons');

if (!fs.existsSync(outputDir)) {
    fs.mkdirSync(outputDir, { recursive: true });
}

const sizes = [16, 32, 48, 64, 128];

sizes.forEach(size => {
    sharp(inputFile)
        .resize(size, size)
        .toFile(path.join(outputDir, `favicon-${size}x${size}.png`))
        .then(() => console.log(`Generated favicon-${size}x${size}.png`))
        .catch(err => console.error(err));
});
