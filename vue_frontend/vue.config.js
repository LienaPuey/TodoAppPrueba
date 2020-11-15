module.exports = {
    devServer: {
      proxy: {
        '^/api': {
          target: 'http://172.17.144.210:8000', //check ip in wsl and port in symfony: ip -c a //PONER EN EL README
          changeOrigin: true,
          ws: true
        },
      }
    }
  }