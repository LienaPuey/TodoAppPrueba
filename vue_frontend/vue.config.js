module.exports = {
    devServer: {
      proxy: {
        '^/api': {
          target: 'http://localhost:8000', //check ip in wsl and port in symfony: ip -c a //PONER EN EL README
          changeOrigin: true,
          ws: true,
          secure: false //problems with proxy!!!!!!!! check check checkkkkk
        },
      }
    }
  }