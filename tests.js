const sendAudioFile = file => {
  const formData = new FormData();
  formData.append('audio-file', file);
  return fetch('blob:http://127.0.0.1/6937c9d0-4118-4bae-8a28-b4e854bc1c0b', {
    method: 'POST',
    body: formData
  });
};