server.post('/products/', async (req, res, next) => {
    const record = req.body;
    try {
       const dbResult = await model.save(record);
       await logEvent('new_product_created', dbResult.id)
           .catch(err =>
           logger.error('Failed analytics' + err.message));
       res.json({ success: true, id: dbResult.id });
    } catch (err) {
       next(err);
    }
});
